<?php
header('Content-Type: application/json');
require_once 'config.php';

try {
    $db = getDBConnection();

    // Get all published volumes
    $query = "
        SELECT 
            v.id,
            v.volume_number,
            v.issue_number,
            v.publication_date,
            v.page_range,
            v.issn,
            v.cover_image,
            v.volume_pdf,
            v.total_articles,
            v.total_downloads,
            v.is_special_edition,
            v.special_edition_year
        FROM volumes v
        WHERE v.status = 'published'
        ORDER BY v.publication_date DESC, v.volume_number DESC, v.issue_number DESC
    ";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $volumes = $stmt->fetchAll();

    // Format response for each volume
    foreach ($volumes as &$volume) {
        $volume['publicationDate'] = $volume['publication_date'];
        $volume['pageRange'] = $volume['page_range'];
        $volume['issueNumber'] = $volume['issue_number'];
        $volume['volumeNumber'] = $volume['volume_number'];
        $volume['articles'] = [];
        $volume['volumeId'] = $volume['id'];
        $volume['totalArticles'] = (int) $volume['total_articles'];
        $volume['article_count'] = (int) $volume['total_articles'];
        $volume['isSpecialEdition'] = !empty($volume['is_special_edition']);
        $volume['specialEditionYear'] = $volume['special_edition_year'];

        // Format cover image URL
        if (!empty($volume['cover_image'])) {
            $volume['coverImage'] = SITE_URL . '/uploads/covers/' . $volume['cover_image'];
        } else {
            $volume['coverImage'] = null;
        }

        // Format volume PDF URL
        if (!empty($volume['volume_pdf'])) {
            $volume['pdfUrl'] = SITE_URL . '/uploads/pdfs/' . $volume['volume_pdf'];
        } else {
            $volume['pdfUrl'] = null;
        }
    }

    // Calculate statistics using only the volumes table
    $statsQuery = "
        SELECT 
            COUNT(*) as total_volumes,
            COALESCE(SUM(total_articles), 0) as total_articles,
            COALESCE(SUM(total_downloads), 0) as total_downloads
        FROM volumes
        WHERE status = 'published'
    ";

    $statsStmt = $db->prepare($statsQuery);
    $statsStmt->execute();
    $stats = $statsStmt->fetch();

    echo json_encode([
        'success' => true,
        'volumes' => $volumes,
        'totalVolumes' => (int) $stats['total_volumes'],
        'totalArticles' => (int) $stats['total_articles'],
        'totalDownloads' => (int) $stats['total_downloads']
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Failed to load volumes: ' . $e->getMessage()
    ]);
}

?>
<?php
    require_once 'app/database/db.php';
    require_once 'app/assistance/slug.php';
    define("LIMIT", 15);

    $remove_special_chars = '';
    $result_of_search;
    $tags = selectAll('tag');
    $categories = selectAll('category');
    // $posts = selectAll('post', ['published' => 1], 0, [], true);

    // pagination
    if(isset($_GET['page']) && $_GET['page'] !== ''){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    $start = ($page - 1) * LIMIT;
    // pagination for search results
    if(isset($_GET['search']) && $_GET['search'] !== ''){
        $search = $_GET['search'];
        //search in slug property (remove the accent), replace all empty charater to %
        // ex: xin chào ==> xin%chao
        $search_slug = replace_character(remove_accent($search), '%');
        // keep the accent, replace all empty charater to %
        $remove_special_chars = remove_special_char($search);
        $search_txt = replace_character($remove_special_chars, '%');

        $result_of_search = search($search_slug, $search_txt);
    }else{
        // pagination for all articles
        $total_posts = countPosts('post');
        $posts = queryPosts('post', $start, LIMIT);
        $last_page = ceil($total_posts / LIMIT);
    }
    
 
 



<?phpif (!function_exists('tc_check_active_menu')) {    function tc_check_active_menu()    {        $path = request()->path();        $user = [];        $category = ['admin/category', 'admin/category/store', 'admin/category/detail'];        $posts = ['admin/post', 'admin/post/edit', 'admin/post/store'];        if (in_array($path, $posts)) {            return 'posts';        } else if (in_array($path, $category)) {            return 'category';        } else {            return '';        }    }}
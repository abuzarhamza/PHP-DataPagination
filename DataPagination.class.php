<?
    class DataPageset {

    // total_entries'       => $total_entries, 
    // 'entries_per_page'    => $entries_per_page, 
    // # Optional, will use defaults otherwise.
    // 'current_page'        => $current_page,
    // 'pages_per_set'       => $pages_per_set,
    // 'mode'                => 'fixed', # default, or 'slide' 
    var $total_entries,$entries_per_page,$current_page,
    $mode,$entries_per_page,$pages_per_set;

    function __construct($total_entries,$entries_per_page,$current_page=1,$pages_per_set=10,$mode='fixed') {
        $this->total_entries = $total_entries;
        $this->entries_per_page = $entries_per_page;
        $this->current_page = $current_page;
        $this->pages_per_set = $pages_per_set;
        $this->mode = $mode;
    }

    function entries_per_page() {

    }

    function current_page() {

    }

    function total_entries() {

    }

    function first_page() {
    }
    }
    function last_page() {

    }
    function _calc_start_page() {

    }
    function pages_per_set() {
        
    }
?>
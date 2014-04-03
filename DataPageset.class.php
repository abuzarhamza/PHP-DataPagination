<?
    class DataPageset {

        var $total_entries,$entries_per_page,$current_page,
        $mode,$pages_per_set;

        function __construct($total_entries=0,$entries_per_page=10,$current_page=1,$pages_per_set=10,$mode='slide') {
            $this->total_entries    = $total_entries;
            $this->entries_per_page = $entries_per_page;
            $this->current_page     = $current_page;
            $this->pages_per_set    = $pages_per_set;
            $this->mode             = $mode;
        }

        public function entries_per_page($entries_per_page) {
            $this->entries_per_page = $entries_per_page;
        }

        public function total_entries($total_entries) {
            $this->total_entries=$total_entries;
        }

        public function first_page() {
            $this->first_page =1;
            return $this->first_page;
        }

        public function current_page() {
            // $this->total_entries;
            // $this->entries_per_page;
            //  current_page
            if (empty($this->total_entries) ||
                 empty($this->entries_per_page) || empty($this->current_page)
            ) {
                return $this->first_page;
            }

            if ( $this->current_page < $this->first_page ) {
                return $this->first_page;
            }
            if ( $this->current_page > $this->last_page ) {
                return $this->last_page;
            }

            return $this->current_page; 
        }

        public function last_page() {

            $pages = $this->total_entries / $this->entries_per_page;
            if ($pages == intval($pages) ) {
                $this->last_page = $pages;
            } else {
                $this->last_page = $pages +1;
            }

            if ( $this->last_page < 1 ) {
                $this->last_page = 1;
            }
            return $this->last_page;
        }

        public function enteries_on_this_page() {
            if ($this->total_entries == 0) {
                return 0;
            } else {
                return $this->last() - $this->first() + 1;
            }
        }

        //This method returns the number of the first entry on the current page:
        public function first() {
            if ($this->total_entries == 0 ) {
                return 0;
            } else {
                return ( ($this->current_page - 1) * $this->entries_per_page) +1;
            }
        }

        //This method returns the number of the last entry on the current page:
        public function last() {
            if ( $this->current_page == $this->last_page() ) {
                return $this->total_entries;
            } else {
                return ( $this->current_page * $this->entries_per_page );
            }
        }

        public function previous_page() {
            if ( $this->current_page > 1) {
                return $this->current_page - 1;
            } else {
                return undef;
            }
        }

        public function next_page() {
            if ( $this->current_page > 1
                && $this->current_page < $this->last_page()
            ) {
                return $this->current_page + 1;
            } else {
                return undef;
            }
        }

    }

?>

<?
$obj = new DataPageset(100,10,4,0,'slide');
echo "test1\n";
echo "current page :" . $obj->current_page . "\n";
echo "previous_page : ". $obj->previous_page() . "\n";
echo "last_page : ". $obj->last_page() . "\n";
echo "next_page : ". $obj->next_page() . "\n";
echo "enteries_on_this_page : ". $obj->enteries_on_this_page() . "\n";

$obj->current_page = 5;
echo "test1\n";
echo "current page :" . $obj->current_page . "\n";
echo "previous_page : ". $obj->previous_page() . "\n";
echo "last_page : ". $obj->last_page() . "\n";
echo "next_page : ". $obj->next_page() . "\n";
echo "enteries_on_this_page : ". $obj->enteries_on_this_page() . "\n";

?>
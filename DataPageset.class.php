<?
    class DataPageset {

        var $total_entries,$entries_per_page,$current_page,
        $mode,$entries_per_page,$pages_per_set;

        public function __construct($total_entries=0,$entries_per_page=10,$current_page=1,$pages_per_set=10,$mode='slide') {
            $this->total_entries    = $total_entries;
            $this->entries_per_page = $entries_per_page;
            $this->current_page     = $current_page;
            $this->pages_per_set    = $pages_per_set;
            $this->mode             = $mode;
        }

        public function entries_per_page($entries_per_page) {
            $this->entries_per_page = $entries_per_page
        }

        public function current_page($current_page) {
            $this->current_page=$current_page;
        }

        public function total_entries($total_entries) {
            $this->total_entries=$total_entries;
        }

        public function total_entries($total_entries) {
            $this->total_entries=$total_entries;
        }

        public function first_page() {
            $this->first_page =1;
            return $this->first_page;
        }

        // __PACKAGE__->mk_accessors(qw(total_entries entries_per_page current_page));
        // sub current_page {
        //     my $self = shift;
        //     if (@_) {
        //         return $self->_current_page_accessor(@_);
        //     }
        //     return $self->first_page unless defined $self->_current_page_accessor;

        //     return $self->first_page
        //         if $self->_current_page_accessor < $self->first_page;

        //     return $self->last_page
        //         if $self->_current_page_accessor > $self->last_page;

        //     return $self->_current_page_accessor();
        // }
        //This method gets or sets the current page number
        public function current_page($current_page=1) {
            // $this->total_entries;
            // $this->entries_per_page;
            //  current_page
            $this->current_page = $current_page;
            return $this->current_page;
        }

        public function last_page() {
            $pages = $this->total_entries / $this->entries_per_page;
            if ($pages == int($pages) ) {
                $this->last_page=$pages;
            } else {
                $this->last_page =$pages +1;
            }
            $this->last_page =1 if ($this->last_page < 1);
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
            if ( $this->current_page == $this->last_page ) {
                return $this->total_entries;
            } else {
                return ( $this->current_page * $this->entries_per_page );
            }
        }

        public function previous_page() {
            if ($this->current_page > 1) {
                return $self->current_page - 1;
            } else {
                return undef;
            }
        }


    }

?>

<?
$obj = new DataPageset(100,10,4,0,'slide');
echo $obj->previous_page();
echo $obj->enteries_on_this_page();
?>

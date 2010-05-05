<!-- Object based, reusable component approach in PHP 5/4 classes and objects -->
<!-- mediasworks.org -->
<!-- mediasworks Group, India and worldwide -->
<!-- mediasworks nonprofit public participation project -->
<?php

# php>=5 versions
if (version_compare(PHPVERSION,'5','>='))
{

	class DateOfBirth {

    private $current_num_year;
    private $current_num_month;
    private $current_num_day;

    private $current_num_month_days;

    public $birth_num_year;
    public $birth_num_month;
    public $birth_num_day;

    public $yy;
    public $mm;
    public $dd;

    public $age;

    public function DateOfBirth()
    {
        $this->current_num_year = date(Y);
        $this->current_num_month = date(n);
        $this->current_num_day = date(j);
        $this->current_num_month_days = date(t);
    }

    private function birthday_before_today()
    {
        $this->yy = $this->current_num_year - $this->birth_num_year;
        $this->mm = $this->current_num_month - $this->birth_num_month - 1;
        $this->dd = $this->birth_num_month_days - $this->birth_num_day + $this->current_num_day;
        if($this->dd > $this->current_num_month_days)
        {
            $this->mm += 1;
            $this->dd -= $this->current_num_month_days;
        }
    }

    private function birthday_on_today()
    {
        $this->yy = $this->current_num_year - $this->birth_num_year;
        $this->mm = 0;
        $this->dd = 0;
    }

    private function birthday_after_today()
    {
        $this->yy = $this->current_num_year - $this->birth_num_year - 1;
        $this->mm = 12 - ($this->birth_num_month - $this->current_num_month) - 1;
        $this->dd = $this->birth_num_month_days - $this->birth_num_day + $this->current_num_day;
        if($this->dd > $this->current_num_month_days)
        {
            $this->mm += 1;
            $this->dd -= $this->current_num_day;
        }
    }

    function calculate_age($months_days = false)
    {
        $this->birth_num_month_days = date( t, mktime(0, 0, 0, $this->birth_num_month, $this->birth_num_day, $this->birth_num_year) );
        if($this->current_num_month > $this->birth_num_month)
        {
            $this->birthday_before_today();
        }
        elseif($this->current_num_month < $this->birth_num_month)
        {
            $this->birthday_after_today();
        }
        else
        {
            if($this->current_num_day == $this->birth_num_day)
            {
                $this->birthday_on_today();
            }
            elseif($this->current_num_day < $this->birth_num_day)
            {
                $this->birthday_after_today();
            }
            else
            {
                $this->birthday_before_today();
            }
        }
        $this->age = $this->yy . ($months_days ? ' years, ' . $this->mm . ' months and ' . $this->dd . ' days' : '');
    }
	}

}
# php<5 versions
else
{
	class DateOfBirth {

    var $current_num_year;
    var $current_num_month;
    var $current_num_day;

    var $current_num_month_days;

    var $birth_num_year;
    var $birth_num_month;
    var $birth_num_day;

    var $yy;
    var $mm;
    var $dd;

    var $age;

    function DateOfBirth()
    {
        $this->current_num_year = date(Y);
        $this->current_num_month = date(n);
        $this->current_num_day = date(j);
        $this->current_num_month_days = date(t);
    }

    function birthday_before_today()
    {
        $this->yy = $this->current_num_year - $this->birth_num_year;
        $this->mm = $this->current_num_month - $this->birth_num_month - 1;
        $this->dd = $this->birth_num_month_days - $this->birth_num_day + $this->current_num_day;
        if($this->dd > $this->current_num_month_days)
        {
            $this->mm += 1;
            $this->dd -= $this->current_num_month_days;
        }
    }

    function birthday_on_today()
    {
        $this->yy = $this->current_num_year - $this->birth_num_year;
        $this->mm = 0;
        $this->dd = 0;
    }

    function birthday_after_today()
    {
        $this->yy = $this->current_num_year - $this->birth_num_year - 1;
        $this->mm = 12 - ($this->birth_num_month - $this->current_num_month) - 1;
        $this->dd = $this->birth_num_month_days - $this->birth_num_day + $this->current_num_day;
        if($this->dd > $this->current_num_month_days)
        {
        $this->mm += 1;
        $this->dd -= $this->current_num_day;
        }
    }

    function calculate_age($months_days = false)
    {
        $this->birth_num_month_days = date( t, mktime(0, 0, 0, $this->birth_num_month, $this->birth_num_day, $this->birth_num_year) );
        if($this->current_num_month > $this->birth_num_month)
        {
            $this->birthday_before_today();
        }
        elseif($this->current_num_month < $this->birth_num_month)
        {
            $this->birthday_after_today();
        }
        elseif($this->current_num_month == $this->birth_num_month)
        {
            if($this->current_num_day == $this->birth_num_day)
            {
                $this->birthday_on_today();
            }
            elseif($this->current_num_day < $this->birth_num_day)
            {
                $this->birthday_after_today();
            }
            else
            {
                $this->birthday_before_today();
            }
        }
        $this->age = $this->yy . ($months_days ? ' years, ' . $this->mm . ' months and ' . $this->dd . ' days' : '');
    }
	}

}

/*
$my_dob = new DateOfBirth(1981, 6, 23); // If Constructor (function) has arguments
$my_dob = new DateOfBirth();
$my_dob->birth_num_year = 1981;
$my_dob->birth_num_month = 6;
$my_dob->birth_num_day = 23;
$my_dob->calculate_age();
echo $my_dob->age;
*/

?>
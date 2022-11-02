<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("vuegenerique.php");
class VueRdv extends vueGenerique
{
    public function __construct()
    {
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;
    public function AffichageRdv()
    {

        // Set your timezone
date_default_timezone_set('Europe/Paris');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('m / Y', $timestamp);

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);
 
// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);


// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
     
    $date = $ym . '-' . $day;
     
    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';
     
    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        // Prepare for new week
        $week = '';
    }

}
    ?>


    <style>

    </style>

    
    <!-- Custom styles for this template -->
    <link href="dropdowns.css" rel="stylesheet">
  </head>
  <body>
    
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">


  <symbol id="arrow-left-short" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
  </symbol>

  <symbol id="arrow-right-short" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
  </symbol>
</svg>


<div class="b-example-divider"></div>

<div id="calendrier" class="dropdown-menu d-block position-static p-2 shadow rounded-3 w-340px">
  <div class="d-grid gap-1">
    <div class="cal">
      <div class="cal-month">
        <button class="btn cal-btn" type="button">
          <svg class="bi" width="16" height="16"><use xlink:href="#arrow-left-short"/></svg>
        </button>
        <strong class="cal-month-name">June</strong>
        <select class="form-select cal-month-name d-none">
          <option value="January">January</option>
          <option value="February">February</option>
          <option value="March">March</option>
          <option value="April">April</option>
          <option value="May">May</option>
          <option value="June">June</option>
          <option value="July">July</option>
          <option value="August">August</option>
          <option value="September">September</option>
          <option value="October">October</option>
          <option value="November">November</option>
          <option value="December">December</option>
        </select>
        <button class="btn cal-btn" type="button" >
          <svg class="bi" width="16" height="16"><use xlink:href="#arrow-right-short"/></svg>
        </button>
      </div>
      <tr class="cal-weekdays text-muted">
        <th class="cal-weekday">Sun</th>
        <th class="cal-weekday">Mon</th>
        <th class="cal-weekday">Tue</th>
        <th class="cal-weekday">Wed</th>
        <th class="cal-weekday">Thu</th>
        <th class="cal-weekday">Fri</th>
        <th class="cal-weekday">Sat</th>
    </tr>
      <div class="cal-days">

        <button class="btn cal-btn" type="button">1</button>
        <button class="btn cal-btn" type="button">2</button>
        <button class="btn cal-btn" type="button">3</button>
        <button class="btn cal-btn" type="button">4</button>
        <button class="btn cal-btn" type="button">5</button>
        <button class="btn cal-btn" type="button">6</button>
        <button class="btn cal-btn" type="button">7</button>

        <button class="btn cal-btn" type="button">8</button>
        <button class="btn cal-btn" type="button">9</button>
        <button class="btn cal-btn" type="button">10</button>
        <button class="btn cal-btn" type="button">11</button>
        <button class="btn cal-btn" type="button">12</button>
        <button class="btn cal-btn" type="button">13</button>
        <button class="btn cal-btn" type="button">14</button>

        <button class="btn cal-btn" type="button">15</button>
        <button class="btn cal-btn" type="button">16</button>
        <button class="btn cal-btn" type="button">17</button>
        <button class="btn cal-btn" type="button">18</button>
        <button class="btn cal-btn" type="button">19</button>
        <button class="btn cal-btn" type="button">20</button>
        <button class="btn cal-btn" type="button">21</button>

        <button class="btn cal-btn" type="button">22</button>
        <button class="btn cal-btn" type="button">23</button>
        <button class="btn cal-btn" type="button">24</button>
        <button class="btn cal-btn" type="button">25</button>
        <button class="btn cal-btn" type="button">26</button>
        <button class="btn cal-btn" type="button">27</button>
        <button class="btn cal-btn" type="button">28</button>

        <button class="btn cal-btn" type="button">29</button>
        <button class="btn cal-btn" type="button">30</button>
        <button class="btn cal-btn" type="button">31</button>
      </div>
    </div>
  </div>
</div>

<div class="b-example-divider"></div>


  </body>

      <style>
        #calendrier{
            width:500px;
        }
        .cal-weekdays{
            border: dashed red;
                }
      </style>

<?php
    }
    
}

?>


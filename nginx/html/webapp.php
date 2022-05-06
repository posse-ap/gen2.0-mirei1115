<?php
require('db_connect.php');

// 合計
$total_study_time = $dbh -> query("SELECT sum(study_time) AS sum_study_time FROM studies");
$totalStudyTime = $total_study_time -> fetch();

// 日ごと
$day_study_time = $dbh -> query("SELECT sum(study_time) AS sum_study_time FROM studies WHERE study_date = CURRENT_DATE()");
$dayStudyTime = $day_study_time -> fetch();

// 月ごと
$month_study_time = $dbh -> query("SELECT sum(study_time) AS sum_study_time FROM studies WHERE DATE_FORMAT(study_date, '%Y%m') = DATE_FORMAT(now(), '%Y%m') ");
$monthStudyTime = $month_study_time -> fetch();

// 棒グラフ
$per_study_time = $dbh -> query("SELECT study_time FROM studies WHERE study_date = '2022-05-06'");
$perStudyTime = (int)$per_study_time -> fetchAll();

// $per_study_time = $dbh -> query("SELECT study_time FROM studies");
// $perStudyTime = (int)$per_study_time -> fetchAll();

// $current_time = $dbh -> query("SELECT study_time FROM studies WHERE study_date = '2022-05-06'");
// $currentTime = (int)$current_time -> fetchAll();
// print_r($currentTime);

// 円グラフ言語
$html_total = $dbh ->query("SELECT sum(study_time) AS sum_study_time FROM studies WHERE languages_id = 1");
$css_total = $dbh ->query("SELECT sum(study_time) AS sum_study_time FROM studies WHERE languages_id = 2");
$javascript_total = $dbh ->query("SELECT sum(study_time) AS sum_study_time FROM studies WHERE languages_id = 3");
$php_total = $dbh ->query("SELECT sum(study_time) AS sum_study_time FROM studies WHERE languages_id = 4");
$laravel_total = $dbh ->query("SELECT sum(study_time) AS sum_study_time FROM studies WHERE languages_id = 5");
$htmlTotal = $html_total ->fetch();
$cssTotal = $css_total ->fetch();
$javascriptTotal = $javascript_total ->fetch();
$phpTotal = $php_total ->fetch();
$laravelTotal = $laravel_total ->fetch();

// 円グラフコンテンツ
$dot_total = $dbh ->query("SELECT sum(study_time) AS sum_study_time FROM studies WHERE contents_id = 1");
$nyobi_total = $dbh ->query("SELECT sum(study_time) AS sum_study_time FROM studies WHERE contents_id = 2");
$posse_total = $dbh ->query("SELECT sum(study_time) AS sum_study_time FROM studies WHERE contents_id = 3");
$dotTotal = $dot_total ->fetch();
$nyobiTotal = $nyobi_total ->fetch();
$posseTotal = $posse_total ->fetch();

// $per_language = $dbh -> query("SELECT languages_id FROM studies");
// perLanguageTime = $ per_language -> fetchAll();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>POSSE</title>
</head>
<body>
  <header class="header">
    <div class="d-lg-flex header-container mx-auto">
      <div class="d-flex">
        <h1>
          <img src="./img/header-logo.png" class="header-img pr-3" alt="POSSE">
        </h1>
        <p class="header-text my-auto">4th week</p>
      </div>
      <button class="post-btn mr-0 ml-auto my-auto d-none d-lg-block" data-toggle="modal" data-target="#modalPost">記録・投稿</button>
    </div>
  </header>

  <main>

    <div class="main-container mx-auto">
      <div class="cards d-lg-flex justify-content-between">

        <div class="time-section">
          <dl class="time-cards d-flex justify-content-between">
            <div class="card text-center py-2 py-lg-3">
              <dt class="time-cards-title mb-0">Today</dt>
              <span class="font-weight-bold h2 lg-h1 my-1 my-lg-2"><?php echo $dayStudyTime["sum_study_time"] ?></span>

              <span class="text-muted hour">hour</span>
            </div>
            <div class="card text-center py-2 py-lg-3">
              <dt class="time-cards-title mb-0">Month</dt>
              <span class="font-weight-bold h2 lg-h1 my-1 my-lg-2"><?php echo $monthStudyTime["sum_study_time"] ?></span>
              <span class="text-muted hour">hour</span>
            </div>
            <div class="card text-center py-2 py-lg-3">
              <dt class="time-cards-title mb-0">Total</dt>
              <span class="font-weight-bold h2 lg-h1 my-1 my-lg-2"><?php echo $totalStudyTime["sum_study_time"] ?></span>
              <span class="text-muted hour">hour</span>
            </div>
          </dl>

          <hr class="d-lg-none">

          <section class="card time-graph-card">
            <div id="pc_columnchart_values" class="d-none d-lg-block"></div>
            <div id="sp_columnchart_values" class="d-block d-lg-none"></div>
          </section>
        </div>

        <div class="study-content-section d-flex justify-content-between">
          <section class="card language-card">
            <div class="language-card-container py-4">
              <h2 class="font-weight-bold lg-h5 mb-0">学習言語</h2>
              <div id="language_piechart"></div>
              <div class="item-list">
                <span class="item">HTML</span>
                <span class="item">CSS</span>
                <span class="item">JavaScript</span>
                <span class="item">PHP</span>
                <span class="item">Laravel</span>
                <span class="item">SQL</span>
                <span class="item">SHELL</span>
                <span class="item">情報システム基礎知識(その他)</span>
              </div>
            </div>
          </section>
          <section class="card contents-card">
            <div class="contents-card-container py-4">
              <h2 class="font-weight-bold lg-h5 mb-0">学習コンテンツ</h2>
              <div id="contents_piechart"></div>
              <div class="item-list">
                <span class="item">ドットインストール</span>
                <span class="item">N予備校</span><br>
                <span class="item">POSSE課題</span>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </main>

  <footer class="mt-3 mt-lg-4 main-container mx-auto">
    <p class="text-center font-weight-bold"><span class="pr-3" id="prev">&lt;</span><span id="thisMonth"></span><span class="pl-3" id="next">&gt;</span></p>

    <button class="post-btn mx-auto d-block d-lg-none" data-toggle="modal" data-target="#modalPost">記録・投稿</button>
  </footer>

  <!-- modal main -->
  <div class="modal fade" id="modalPost" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-container">
          <form action="">
            <div class="form-group d-lg-flex justify-content-between">
              <div class="modal-left-parts">
                <section class="modal-date-part">
                  <p class="font-weight-bold modal-title">学習日</p>
                  <input type="text" id="studyDate" data-toggle="modal" data-target="#modalCalendar">
                </section>
                <section class="modal-contents-pc-part d-none d-lg-block pt-3">
                  <p class="font-weight-bold modal-title">学習コンテンツ (複数選択可)</p>
                  <input id="contents1" type="checkbox" value="N予備校">
                  <label for="contents1">N予備校</label>

                  <input id="contents2" type="checkbox" value="ドットインストール">
                  <label for="contents2">ドットインストール</label>

                  <input id="contents3" type="checkbox" value="POSSE課題">
                  <label for="contents3">POSSE課題</label>
                </section>

                <section class="modal-contents-sp-part d-block d-lg-none pt-3">
                  <p class="font-weight-bold modal-title">学習コンテンツ (複数選択可)</p>
                  <div class="modal-contents-select-box" id="modal-contents-select-box">
                    <select>
                      <option>N予備校</option>
                    </select>
                    <div class="modal-contents-over-select"></div>
                  </div>
                  <div id="modal-contents-check-box">
                    <input type="checkbox" id="contents4" value="N予備校">
                    <label for="contents4">N予備校</label>
                    <input type="checkbox" id="contents5" value="ドットインストール">
                    <label for="contents5">ドットインストール</label>

                    <input type="checkbox" id="contents6" value="POSSE課題">
                    <label for="contents6">POSSE課題</label>
                  </div>
                </section>

                <section class="modal-language-pc-part d-none d-lg-block pt-3">
                  <p class="font-weight-bold modal-title">学習言語 (複数選択可)</p>
                  <input id="language1" type="checkbox" value="HTML">
                  <label for="language1">HTML</label>

                  <input id="language2" type="checkbox" value="CSS">
                  <label for="language2">CSS</label>

                  <input id="language3" type="checkbox" value="JavaScript">
                  <label for="language3">JavaScript</label>

                  <input id="language4" type="checkbox" value="PHP">
                  <label for="language4">PHP</label>

                  <input id="language5" type="checkbox" value="Laravel">
                  <label for="language5">Laravel</label>

                  <input id="language6" type="checkbox" value="SQL">
                  <label for="language6">SQL</label>

                  <input id="language7" type="checkbox" value="SHELL">
                  <label for="language7">SHELL</label>

                  <input id="language8" type="checkbox" value="情報システム基礎知識(その他)">
                  <label for="language8">情報システム基礎知識(その他)</label>
                </section>

                <div class="modal-language-sp-part d-block d-lg-none pt-3">
                  <p class="font-weight-bold modal-title">学習言語 (複数選択可)</p>
                  <div class="modal-language-select-box" id="modal-language-select-box">
                    <select>
                      <option>HTML</option>
                    </select>
                    <div class="modal-language-over-select"></div>
                  </div>
                  <div id="modal-language-check-box">
                    <input id="language9" type="checkbox" value="HTML">
                    <label for="language9">HTML</label>

                    <input id="language10" type="checkbox" value="CSS">
                    <label for="language10">CSS</label>

                    <input id="language11" type="checkbox" value="JavaScript">
                    <label for="language11">JavaScript</label>

                    <input id="language12" type="checkbox" value="PHP">
                    <label for="language12">PHP</label>

                    <input id="language13" type="checkbox" value="Laravel">
                    <label for="language13">Laravel</label>

                    <input id="language14" type="checkbox" value="SQL">
                    <label for="language14">SQL</label>

                    <input id="language15" type="checkbox" value="SHELL">
                    <label for="language15">SHELL</label>

                    <input id="language16" type="checkbox" value="情報システム基礎知識(その他)">
                    <label for="language16">情報システム基礎知識(その他)</label>
                  </div>
                </div>
              </div>
              <div class="modal-right-parts pt-3 pt-lg-0">
                <section class="modal-time-part">
                  <p class="font-weight-bold modal-title">学習時間</p>
                  <input type="text">
                </section>
                <section class="modal-twitter-part pt-3">
                  <p class="font-weight-bold modal-title">Twitter用コメント</p>
                  <textarea id="postTwitter" cols="0" rows="9"></textarea>
                </section>
                <div class="modal-twitter-auto-part pt-1">
                  <input id="twitter" type="checkbox" checked><label for="twitter">Twitterに自動投稿する</label>
                </div>
              </div>
            </div>
            <button type="button" class="post-btn d-block mx-auto mt-3 mb-4" id="to-modalLoading" data-toggle="modal" data-target="#modalLoading">記録・投稿</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal main -->

  <!-- modal calendar -->
  <div class="modal fade" id="modalCalendar" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&larr;</span>
        </button>
        <div class="modal-container">
          <div class="modal-calendar">
            <table>
              <thead>
                <tr>
                  <th id="calendarPrev" colspan="2">&lt;</th>
                  <th id="calendarThisMonth" colspan="3"></th>
                  <th id="calendarNext" colspan="2">&gt;</th>
                </tr>
                <tr class="calendar-day">
                  <th>Sun</th>
                  <th>Mon</th>
                  <th>Tue</th>
                  <th>Wed</th>
                  <th>Thu</th>
                  <th>Fri</th>
                  <th>Sat</th>
                </tr>
              </thead>

              <tbody class="calendar">
              </tbody>
            </table>
            <button type="button" class="post-btn d-block mx-auto mt-4" id="decideCalendar">決定</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal calendar -->

  <!-- modal loading -->
  <div class="modal fade" id="modalLoading" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-container">
          <div class="loader-wrap">
            <div class="loader">Loading...</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal loading -->

  <!-- modal success -->
  <div class="modal fade" id="modalSuccess" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog modal-success-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-container text-center">
          <p class="modal-success-color">AWESOME!</p>
          <span class="modal-success-color modal-check-mark"></span>
          <p>記録・投稿<br>完了しました</p>
        </div>
      </div>
    </div>
  </div>
  <!-- modal success -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js" integrity="sha512-JZSo0h5TONFYmyLMqp8k4oPhuo6yNk9mHM+FY50aBjpypfofqtEWsAgRDQm94ImLCzSaHeqNvYuD9382CEn2zw==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- <script type="text/javascript" src="./js/calendar/index.js"></script>
  <script type="text/javascript" src="./js/chart/index.js"></script>
  <script type="text/javascript" src="./js/displayThisMonth/index.js"></script>
  <script type="text/javascript" src="./js/modal/index.js"></script>
  <script type="text/javascript" src="./js/utils/index.js"></script> -->
</body>
</html>
  <script>
    // 棒グラフ
    // よく使うカラーを定義しておく
    const WHITE = "#fff"
    const CHART_COLOR_BLUE_1 = "#0f71bc"
    const CHART_COLOR_BLUE_2= "#3ccfff"

    const createStudyTimeChart = () => {
        // 学習時間
        // 2次元配列をDataTableに変更する
        // 参考: https://developers.google.com/chart/interactive/docs/reference#arraytodatatable
        const data = google.visualization.arrayToDataTable([
            // roleについて https://developers.google.com/chart/interactive/docs/roles
            ["Date", "Hour", { role: "style" } ],
            ["", 2, CHART_COLOR_BLUE_1],
            ["2", 8, CHART_COLOR_BLUE_2],
            ["" , 1, CHART_COLOR_BLUE_1],
            ["4", 2, CHART_COLOR_BLUE_2],
            ["" , 3, CHART_COLOR_BLUE_1],
            ["6", "<?php echo $perStudyTime ?>", CHART_COLOR_BLUE_2],
            ["" , 5, CHART_COLOR_BLUE_1],
            ["8", 6, CHART_COLOR_BLUE_2],
            ["" , 7, CHART_COLOR_BLUE_1],
            ["10", 1, CHART_COLOR_BLUE_2],
            [""  , 2, CHART_COLOR_BLUE_1],
            ["12", 3, CHART_COLOR_BLUE_2],
            [""  , 4, CHART_COLOR_BLUE_1],
            ["14", 7, CHART_COLOR_BLUE_2],
            [""  , 2, CHART_COLOR_BLUE_1],
            ["16", 7, CHART_COLOR_BLUE_2],
            [""  , 4, CHART_COLOR_BLUE_1],
            ["18", 3, CHART_COLOR_BLUE_2],
            [""  , 3.2, CHART_COLOR_BLUE_1],
            ["20", 3.5, CHART_COLOR_BLUE_2],
            [""  , 3.2, CHART_COLOR_BLUE_1],
            ["22", 3.5, CHART_COLOR_BLUE_2],
            [""  , 3.2, CHART_COLOR_BLUE_1],
            ["24", 3.5, CHART_COLOR_BLUE_2],
            [""  , 3.2, CHART_COLOR_BLUE_1],
            ["26", 3.5, CHART_COLOR_BLUE_2],
            [""  , 3.2, CHART_COLOR_BLUE_1],
            ["28", 6.5, CHART_COLOR_BLUE_2],
            ["", 8, CHART_COLOR_BLUE_1],
            ["30", 2, CHART_COLOR_BLUE_2],
        ]);
        // DataViewを作成する
        const view = new google.visualization.DataView(data);

        const pc_options = {
            height: '400', // 高さを指定
            bar: { groupWidth: "50%" }, // バーの太さ
            legend: { position: "none" }, // legendを非表示
            vAxis:{
                format:'0h', // 縦軸のメモリ基準
                gridlines:{
                    color: WHITE // 罫線の色
                }
            }
        };
        // DOMで表示場所を指定
        const pcChart = new google.visualization.ColumnChart(document.getElementById("pc_columnchart_values"));
        // チャートを描写
        pcChart.draw(view, pc_options);

        const sp_options = {
            height: '200', // 高さを指定
            bar: {groupWidth: "50%"}, // バーの太さ
            legend: { position: "none" }, // legendを非表示
            vAxis:{
                format:'0h', // 縦軸のメモリ基準
                gridlines:{
                    color:WHITE // 罫線の色
                }
            }
        };
        // DOMで表示場所を指定
        const spChart = new google.visualization.ColumnChart(document.getElementById("sp_columnchart_values"));
        // チャートを描写
        spChart.draw(view, sp_options);
    }

    // 円グラフ言語
    const createLanguagesChart = () => {
        // 学習言語
        // 2次元配列をDataTableに変更する
        const data = google.visualization.arrayToDataTable([
            ['Language', 'Hour'],
            ['HTML', <?php echo $htmlTotal["sum_study_time"] ?>],
            ['CSS', <?php echo $cssTotal["sum_study_time"] ?>],
            ['JavaScript', <?php echo $javascriptTotal["sum_study_time"] ?>],
            ['PHP', <?php echo $phpTotal["sum_study_time"] ?>],
            ['Laravel', <?php echo $laravelTotal["sum_study_time"] ?>],
            ['SQL', 5],
            ['SHELL', 4],
            ['情報システム基礎知識(その他)', 1],
        ]);

        const options = {
            legend:{
                position:"none", // legendを非表示
            },
            // 中心の空白部分 0~1で指定
            pieHole: 0.5,
            // チャートの部分ごとにカラーを指定
            slices: {
                0: { color: '#2222ff' },
                1: { color: '#3344ff' },
                2: { color: '#4466ff' },
                3: { color: '#5588ff' },
                4: { color: '#6699ff' },
                5: { color: '#77aaff' },
                6: { color: '#88ccff' },
                7: { color: '#99ddff' },
                8: { color: '#aaeeff' },
            },
            // チャートサイズ
            chartArea: {
                width: '100%',
                height: '100%'
            }
        };

        // DOMで表示場所を指定
        const chart = new google.visualization.PieChart(document.getElementById('language_piechart'));
        // チャートを描写
        chart.draw(data, options);
    }
    console.log('kamo');

    // 円グラフコンテンツ
    const createContentsChart = () => {
        // 学習コンテンツ
        const data = google.visualization.arrayToDataTable([
            ['Contents', 'Hour'],
            ['ドットインストール', <?php echo $dotTotal["sum_study_time"] ?>],
            ['N予備校', <?php echo $nyobiTotal["sum_study_time"] ?>],
            ['POSSE課題', <?php echo $posseTotal["sum_study_time"] ?>],
        ]);

        const options = {
            legend:{
                position:"none",
            },
            // 中心の空白部分 0~1で指定
            pieHole:0.5,
            // チャートの部分ごとにカラーを指定
            slices: {
                0: { color: '#2222ff' },
                1: { color: '#66aaff' },
                2: { color: '#aaddff' },
            },
            // チャートサイズ
            chartArea: {
                width: '100%',
                height: '100%',
            }
        };

        // DOMで表示場所を指定
        const chart = new google.visualization.PieChart(document.getElementById('contents_piechart'));
        // チャートを描写
        chart.draw(data, options);
    }

    const drawChart = () => {
        // 学習時間を表示
        createStudyTimeChart()

        // 学習言語を表示
        createLanguagesChart()

        // 学習コンテンツを表示
        createContentsChart()
    }

    // パッケージのロード
    // current: Google chart の latest versionを表す
    // corechart: chart種類(bar, column, line, area, stepped area, bubble, pie, donut, combo, candlestick, histogram, scatter)
    // 参照: https://developers.google.com/chart/interactive/docs/basic_load_libs
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // resize時に、チャートを作り直し、windowサイズに合わせたチャートをレンダリングする
    // drawChartが発火しすぎないようにthrottoleで0.25秒間の猶予を設けてる
    window.addEventListener('resize', $.throttle(250, drawChart));
  </script>
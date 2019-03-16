<!-- Star Breadcrumb -->
<div class="breadcrumbs ace-save-state">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">&nbsp;&nbsp;Dashboard</a>
        </li>
        <li class="active">Looping</li>
    </ul>
</div>
<!-- End Breadcrumb -->

<div class="panel panel-primary" id="panel">
    <div class="panel-heading">
        <i class="fa fa-spin fa-spinner fa-fw"></i>&nbsp;&nbsp;Looping
        <button type="button" class="close" data-dismiss="alert" data-target="#panel" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="clearfix"></div>    
    <div class="panel-body">
        <div class="row"><br>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
            <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">

                <b><h4 text-align="justify">Soal Test Looping : 1, 1, 2, 3, 5, 8, 13, 21, 34, 55 <br><br>
                Jawab :

                <?php 
                $a = 1;
                $b = 1;

                echo $a. ",";
                echo $b. ",";

                for ($i=1; $i < 9; $i++)
                {
                    $j = $a+$b;
                    echo $j. ",";

                    $a = $b;
                    $b = $j;
                }
                echo "<br><br><br>";
                ?>

                <pre>
                <?php 
                echo 'Bilangan Deret Angka Fibonacci :

                $a = 1;
                $b = 1;

                echo $a. ",";
                echo $b. ",";

                for ($i=1; $i < 9; $i++)
                {
                    $j = $a+$b;
                    echo $j. ",";

                    $a = $b;
                    $b = $j;
                }
                '; ?>
                </pre>

            </div>
        </div>
    </div>
</div>
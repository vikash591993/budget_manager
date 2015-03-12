     <!--carousel part-->
    <div class="container">
        <div id="mycarousel" class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mycarousel" data-slide-to="1"></li>

            </ol>


            <div class="carousel-inner">
                <div class="item active">
                    <img src=<?php echo base_url('../static/images/gra.jpg'); ?> />
                </div>
                <div class="item">
                    <img src=<?php echo base_url('../static/images/gra2.jpg'); ?> />
                </div>



            </div>
            <a class="left carousel-control" href="#mycarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#mycarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
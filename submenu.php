<html>
    <!-- begin: :head -->
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <!-- end: :head -->
    <style>
        @font-face {
            font-family: "goodTimes";
            src: url('./assets/fonts/good_times_rg.ttf');
        }
        @font-face {
            font-family: "teen";
            src: url('./assets/fonts/teen.ttf');
        }
        /* begin: :body */
        body{
            font-family: "teen";
            background: white;
            padding: 0;
            margin: 0;
        }
        /* end: :body */

        /* begin: :logo */
        #logo{
            font-family: "goodTimes";
            text-align: center;
            font-size: 30px;
            color: whitesmoke;
        }
        /* end: :logo */

        /* begin: :menu */
        .menu{
            text-align: center;
        }

        .menu ul{
            padding: 0px;
        }
        .menu li{
            display: inline;
            font-family: "teen";
        }

        .menu a{
            color: lightsteelblue;
            text-decoration: none;
            font-weight: bold;
            padding: 0px 10px;
        }

        .menu a:hover{
            border-bottom: 2px solid white;
            color: whitesmoke;
        }
        /* end: :menu */

        /* begin: :product */
        .product{
            text-align: center;
        }
        .row{
            display: flex;
            flex-wrap: wrap;
            padding: 0px 10px;
        }

        .column{
            flex: 25%;
            max-width: 100%;
            padding: 0px 10px;
        }

        .column img{
            width: 100%;
            height: 85%;
            margin-bottom: 10px;
            vertical-align: middle;
        }

        .content {
            position: relative;
            display: inline-flex;
            width: 30%;
            height: 60%;
            padding: 5px 5px 5px 5px;
        }

        .harga {
            position: absolute;
            bottom: 50;
            width: 95%;
            padding: 5px 5px 5px 5px;
        }

        /* end: :product */
        /* start: :footer */
        .footer {
            background-color: rgb(13, 13, 13);
            text-align: center;
            font-size: 12px;
            padding-left: 20%;
            padding-right: 20%;
            height: 30%;
            color: whitesmoke;
        }

        .footer ul{
            list-style-type: none;
            text-align: left;
            font-size: 16px;
            margin: 0;
            margin-top: 250;
            padding: 0;
            padding-top: 5%;
        }

        .footer li a{
            display: block;
            width: 70px;
            color: lightsteelblue;
            text-decoration: none;
        }
        /* end: :footer */
    </style>
    <!-- begin: :body -->
    <body>
        <!-- begin: :header -->
        <div class="header" style="background-color: rgb(13, 13, 13); height: 20%;">
            <div id="logo">OutfitLabs</div>
            <div class="menu">
                <ul>
                    <li><a href="#ladies">LADIES</a></li>
                    <li><a href="#men">MEN</a></li>
                    <li><a href="#3">MENU 3</a></li>
                    <li><a href="#4">MENU 4</a></li>
                    <li><a href="#5">MENU 5</a></li>
                </ul>
            </div>
        </div>
        <!-- end: :header -->
        <!-- begin: :product -->
        <div class="product" style="margin-top: 50px;">
            <div class="row">
                <div class="column">
                    <div class="content">
                        <img src="./assets/banner/product.jpg" alt="product">
                        <div class="harga">nama - harga</div>
                    </div>
                    <div class="content">
                        <img src="./assets/banner/product.jpg" alt="product">
                        <div class="harga">nama - harga</div>
                    </div>
                    <div class="content">
                        <img src="./assets/banner/product.jpg" alt="product">
                        <div class="harga">nama - harga</div>
                    </div>
                    <div class="content">
                        <img src="./assets/banner/product.jpg" alt="product">
                        <div class="harga">nama - harga</div>
                    </div>
                    <div class="content">
                        <img src="./assets/banner/product.jpg" alt="product">
                        <div class="harga">nama - harga</div>
                    </div>
                    <div class="content">
                        <img src="./assets/banner/product.jpg" alt="product">
                        <div class="harga">nama - harga</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: :product -->
        <div class="footer">
            <ul>
                <li style="color: white;">Shop</li>
                <li><a href="">Men</a></li>
                <li><a href="">Ladies</a></li>
            </ul>
            <br><br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur corrupti optio vero reiciendis dolor doloribus eligendi. Iusto quo ab eius rem saepe ducimus tempore necessitatibus neque. Placeat possimus quod dicta? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore et earum ipsa itaque voluptatem nemo
        </div>
    </body>
    <!-- end: :body -->
</html>
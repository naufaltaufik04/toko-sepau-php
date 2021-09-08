    <body>
        <style>
            .row{
                justify-content:center;
            }
            .form-group{
                padding-left:235px;
                padding-bottom: 10px;
            }
            checkout{
                width:100px;
            }
            clearCart{
                width:200px;
            }
            #button
            {
                width:100%;
                text-align: center;
                margin-bottom: 10px;
            }
            .inner
            {
                display: inline-block;
            }
        </style>
        <div class="row">
            <div class="col-6">
                <?php include'cart.php';?>
            </div>
        </div>

        <div id="button">
            <div class="inner">
                <a href="shopping_page.php?content=form_transaksi.php" class="btn btn-primary" >Checkout</a>
            </div>
            <div class="inner">
                <a href="shopping_page.php?content=clear_cart.php" class="btn btn-primary">Kosongkan Keranjang</a>
            </div>
        </div>
    </body>
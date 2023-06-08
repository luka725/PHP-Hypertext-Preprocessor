<header class="header">
    <section><img class="logo" src="/assets/images/logo.png" alt=""></section>
    <section class="menu">
        <nav>
            <a class="inout" href="/">Home</a>
        </nav>
    </section>
    <section class="auth">
        <nav>
            <?php
            if(isset($_SESSION['user_id'])){
                $route = "logout";
            }
            else{
                $route = "login";
            }
            ?>
            <a class="inout" href="?page=<?=$route?>" style="margin-right: 20px;"><?=$route?></a>
            <?php
                if($route === "logout"){

                }else{ ?>
                    <a class="inout" href="?page=registration">register</a>
                <?php } ?>
        </nav>
    </section>
</header>
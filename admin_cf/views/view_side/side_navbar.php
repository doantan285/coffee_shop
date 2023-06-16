<div class="side-navbar">
    <ul>
        <form action="<?php echo dir_admin_url; ?>" method="get">
            <li><button type="submit" name="table" value="order"><i class="fa-solid fa-file-invoice"></i>&nbsp; Order</button></li>
            <li><button type="submit" name="table" value="coffee"><i class="fa-solid fa-mug-saucer"></i>&nbsp; Coffees</button></li>
            <li><button type="submit" name="table" value="cake"><i class="fa-solid fa-cookie"></i>&nbsp; Cakes</button></li>
            <?php if ($_SESSION['role'] === 'manager') { ?>
                <li><button type="submit" name="table" value="revenue"><i class="fa-solid fa-money-bill"></i>&nbsp; Revenue</button></li>
                <li><button type="submit" name="table" value="account"><i class="fa-solid fa-people-group"></i>&nbsp; Account</button></li>
            <?php } ?>
        </form>
    </ul>
</div>
<?php $title = "About"; require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; global $Parsedown; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/navigation.php"; ?>

<br>
<div class="container">
    <h1 class="text-center">My name is <span id="scoots">Scootaloo</span>!</h1>
    <h3 class="text-center">I'm the computer pegasus</h3>

    <div id="circles">
        <div class="circle">
            <div class="circle-icon">
                <img class="circle-icon-img" src="/assets/about/mlp.png" alt="">
            </div>
            <div class="circle-text">
                My Little Pony
            </div>
        </div>
        <div class="circle">
            <div class="circle-icon">
                <img class="circle-icon-img" src="/assets/about/computers.png" alt="">
            </div>
            <div class="circle-text">
                Computers
            </div>
        </div>
        <div class="circle">
            <div class="circle-icon">
                <img class="circle-icon-img" src="/assets/about/linux.png" alt="">
            </div>
            <div class="circle-text">
                Linux
            </div>
        </div>
        <div class="circle">
            <div class="circle-icon">
                <img class="circle-icon-img" src="/assets/about/opensource.png" alt="">
            </div>
            <div class="circle-text">
                Open-source
            </div>
        </div>
        <div class="circle">
            <div class="circle-icon">
                <img class="circle-icon-img" src="/assets/about/music.png" alt="">
            </div>
            <div class="circle-text">
                Music
            </div>
        </div>
        <div class="circle">
            <div class="circle-icon">
                <img class="circle-icon-img" src="/assets/about/cinema.png" alt="">
            </div>
            <div class="circle-text">
                Cinema
            </div>
        </div>
        <div class="circle">
            <div class="circle-icon">
                <img class="circle-icon-img" src="/assets/about/photography.png" alt="">
            </div>
            <div class="circle-text">
                Photography
            </div>
        </div>
        <div class="circle">
            <div class="circle-icon">
                <img class="circle-icon-img" src="/assets/about/vector.png" alt="">
            </div>
            <div class="circle-text">
                Graphic design
            </div>
        </div>
    </div>

    <br>

    <p><b>Info about me:</b></p>
    <table class="table">
        <tbody>
            <tr>
                <td class="toe-title"><b>Species</b></td>
                <td class="toe-description">Equestrian pegasus</td>
            </tr>
            <tr>
                <td class="toe-title"><b>Gender</b></td>
                <td class="toe-description">Female</td>
            </tr>
            <tr>
                <td class="toe-title"><b>Location</b></td>
                <td class="toe-description">Ponyville, Equestria</td>
            </tr>
        </tbody>
    </table>

    <p><b>Info about my laptop:</b></p>
    <table class="table">
        <tbody>
        <tr>
            <td class="toe-title"><b>Model</b></td>
            <td class="toe-description">MacBook Air (M1, 2020, 13.3"), Space Gray</td>
        </tr>
        <tr>
            <td class="toe-title"><b>OS</b></td>
            <td class="toe-description">macOS</td>
        </tr>
        <tr>
            <td class="toe-title"><b>CPU</b></td>
            <td class="toe-description">arm64e, Apple M1 (4 performance CPU cores, 4 efficiency CPU cores, 8 GPU cores)</td>
        </tr>
        <tr>
            <td class="toe-title"><b>RAM</b></td>
            <td class="toe-description">8GB LPDDR4</td>
        </tr>
        <tr>
            <td class="toe-title"><b>Storage</b></td>
            <td class="toe-description">512GB NVMe SSD (APPLE SSD AP0512Q)</td>
        </tr>
        </tbody>
    </table>

    <p><b>Info about my secondary laptop:</b></p>
    <table class="table">
        <tbody>
        <tr>
            <td class="toe-title"><b>Model</b></td>
            <td class="toe-description">Panasonic Toughbook CF-MX4</td>
        </tr>
        <tr>
            <td class="toe-title"><b>OS</b></td>
            <td class="toe-description">Arch Linux</td>
        </tr>
        <tr>
            <td class="toe-title"><b>CPU</b></td>
            <td class="toe-description">x86_64, Intel Core i5 vPro 5300U (4 CPU cores)</td>
        </tr>
        <tr>
            <td class="toe-title"><b>RAM</b></td>
            <td class="toe-description">8GB</td>
        </tr>
        <tr>
            <td class="toe-title"><b>Storage</b></td>
            <td class="toe-description">256GB M.2 SATA SSD (Samsung)</td>
        </tr>
        </tbody>
    </table>

    <p><b>Info about my oldest laptop:</b></p>
    <table class="table">
        <tbody>
        <tr>
            <td class="toe-title"><b>Model</b></td>
            <td class="toe-description">Compaq Armada 110</td>
        </tr>
        <tr>
            <td class="toe-title"><b>OS</b></td>
            <td class="toe-description">Unknown/None/Changing too frequently</td>
        </tr>
        <tr>
            <td class="toe-title"><b>CPU</b></td>
            <td class="toe-description">x86, Intel Celeron Coppermine</td>
        </tr>
        <tr>
            <td class="toe-title"><b>RAM</b></td>
            <td class="toe-description">320MB (originally 256MB)</td>
        </tr>
        <tr>
            <td class="toe-title"><b>Storage</b></td>
            <td class="toe-description">10GB IDE (Toshiba)</td>
        </tr>
        </tbody>
    </table>

    <p><b>Info about my phone:</b></p>
    <table class="table">
        <tbody>
        <tr>
            <td class="toe-title"><b>Model</b></td>
            <td class="toe-description">Samsung Galaxy A41 (2020)</td>
        </tr>
        <tr>
            <td class="toe-title"><b>OS</b></td>
            <td class="toe-description">Android/One UI</td>
        </tr>
        <tr>
            <td class="toe-title"><b>CPU</b></td>
            <td class="toe-description">arm64, MediaTek Helio P65 (MT6768, 2 performance CPU cores, 6 efficiency CPU cores)</td>
        </tr>
        <tr>
            <td class="toe-title"><b>RAM</b></td>
            <td class="toe-description">4GB (including 512MB VRAM)</td>
        </tr>
        <tr>
            <td class="toe-title"><b>Storage</b></td>
            <td class="toe-description">64GB NAND (probably Samsung) + 64GB SanDisk SD</td>
        </tr>
        </tbody>
    </table>

    <p><b>Info about my main server:</b></p>
    <table class="table">
        <tbody>
        <tr>
            <td class="toe-title"><b>Model</b></td>
            <td class="toe-description">Lenovo IdeaPad 3</td>
        </tr>
        <tr>
            <td class="toe-title"><b>OS</b></td>
            <td class="toe-description">Fedora Server</td>
        </tr>
        <tr>
            <td class="toe-title"><b>CPU</b></td>
            <td class="toe-description">x86_64, AMD Ryzen 7 5700U (8 CPU cores, 16 threads)</td>
        </tr>
        <tr>
            <td class="toe-title"><b>RAM</b></td>
            <td class="toe-description">12GB (including 1GB VRAM)</td>
        </tr>
        <tr>
            <td class="toe-title"><b>Storage</b></td>
            <td class="toe-description">512GB NVMe SSD (Micron)</td>
        </tr>
        </tbody>
    </table>

    <p><b>Info about my secondary server:</b></p>
    <table class="table">
        <tbody>
        <tr>
            <td class="toe-title"><b>Model</b></td>
            <td class="toe-description">Raspberry Pi 4</td>
        </tr>
        <tr>
            <td class="toe-title"><b>OS</b></td>
            <td class="toe-description">Ubuntu Server</td>
        </tr>
        <tr>
            <td class="toe-title"><b>CPU</b></td>
            <td class="toe-description">arm64, Broadcom BCM 2835 (4 CPU cores)</td>
        </tr>
        <tr>
            <td class="toe-title"><b>RAM</b></td>
            <td class="toe-description">4GB</td>
        </tr>
        <tr>
            <td class="toe-title"><b>Storage</b></td>
            <td class="toe-description">64GB SanDisk Ultra USB</td>
        </tr>
        </tbody>
    </table>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
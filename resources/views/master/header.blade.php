<style>
    .header-wrapper {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 3;
    }

    a {
        text-decoration: none;
    }

    .xContainer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        overflow: hidden;
        padding: 1% 3%;
        height: 80px;
    }

    .user-preference {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .user-preference a {
        margin: 0 0.5rem;
        transition: transform 0.3s ease;
    }

    .dashboard-title span {
        font-size: 2rem;
        font-weight: 500;
    }

    .dashboard-title a {
        text-decoration: none;
        color: red;
    }



    a {
        text-decoration: none !important;
    }

    i {
        transition: transform 0.1s;
    }

    i:hover {
        transform: scale(1.1);

    }

    #mobile-bar {
        display: none;
    }

    @media (max-width: 1100px) {
        #mobile-bar {
            display: block;
        }

        #header-text {
            font-size: 18px;
        }

    }

    .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: #f1f1f1;
    }

    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: #111;
        color: white;
        padding: 10px 15px;
        border: none;
    }

    .openbtn:hover {
        background-color: #444;
    }

    #main {
        transition: margin-left 0.5s;
        padding: 16px;
    }

    .off-mobile-bar {
        background-color: #111;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 1100px) {
        .sidebar {
            padding-top: 15px;
        }

        .sidebar a {
            font-size: 18px;
        }
    }
</style>
<header class="header-wrapper box-shadow-1" style="background-color: black">
    <div class="xContainer">
        <div class="dashboard-title"></div>
        <div class="title">
            <a href="/">
                <h2  class="text-white">BlockChain Project</h2>
            </a>
        </div>
        <div class="user-preference">
            <div data-toggle="tooltip" data-placement="bottom" title="bar" id="mobile-bar" id="main"
                onclick="openNav()">
                <a class="btn btn-dark " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                    aria-controls="offcanvasExample">
                    <i class="fa-solid fa-bars"></i>
                </a>
                <div class="offcanvas offcanvas-start text-bg-dark w-75" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header bg-light">
                        <button type="button" class="btn-close text-light" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                        <a href="/" class="text-dark">
                            <h2>Blockchain</h2>
                        </a>
                    </div>
                    <div class="offcanvas-body ">
                        <main class="d-flex flex-nowrap h-100 ">
                            <div class="d-flex flex-column flex-shrink-0 p-3 ">
                                <ul class="nav nav-pills flex-column mb-auto">
                                    <li class="nav-item">
                                        <a href="/" class="nav-link text-white" aria-current="page">
                                            <svg class="bi pe-none me-2" width="16" height="16">
                                                <use xlink:href="#home" />
                                            </svg>
                                            Home 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/pending" class="nav-link text-white">
                                            <svg class="bi pe-none me-2" width="16" height="16">
                                                <use xlink:href="#speedometer2" />
                                            </svg>
                                            Pending Transactions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/wallets" class="nav-link text-white">
                                            <svg class="bi pe-none me-2" width="16" height="16">
                                                <use xlink:href="#table" />
                                            </svg>
                                            Wallets
                                        </a>
                                    </li>
                                </ul>
                                <hr>
                            </div>
                            <div class="b-example-divider b-example-vr"></div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Massire-Porfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <nav class="nav-b">
        <div class="nav">
            <a class="nav__link" id="active" href="/">SM</a>
            <ul class="nav__links">
                <?php if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == '/') : ?>

                    <li class="nav__item"><a class="nav__link" href="#section-projet">Projet</a></li>
                <?php endif ?>

                <li class="nav__item"><a class="nav__link" href="/contact">Contact</a></li>

                <li class="nav__item"><a class="nav__link btn" href="/resume">Resume</a></li>

            </ul>
        </div>
    </nav>

    <!-- <div class="borderBottom"></div>  -->
    <div class="flashMessage">
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="session">
                <div class="flash-color visibilityVisible">
                    <div class='flash <?= isset($_SESSION['success']) ?  $_SESSION['success'] : "" ?>'> Votre message a été envoyé.</div>
                    <?php unset($_SESSION['success']); ?>
                </div>
            </div>
        <?php } ?>
    </div>

    {{content}}

    <div class="borderBottom"></div>
    <footer id="footer">
        <h2>Sogore Massire &middot; de Mossaka</h2>
        <ul>
            <li>
                <a href="https://www.linkedin.com/in/massire-sogore-a7b93b208/" target="_blank">
                    <span class="fab fa-linkedin" aria-hidden="true"></span>
                    <span class="sr-only">LinkedIn</span>
                </a>
            </li>
            <li>
                <a href="https://github.com/massiresogore" target="_blank">
                    <span class="fab fa-github-square" aria-hidden="true"></span>
                    <span class="sr-only">Github</span>
                </a>
            </li>
            <li>
                <a href="mailto:massire.org@gmail.com">
                    <span class="fas fa-envelope" aria-hidden="true"></span>
                    <span class="sr-only">Email</span>
                </a>
            </li>
        </ul>
        <p><small>© 2023 Sogore Massire. All rights reserved.</small></p>
    </footer>
    <script src="../javascrip/script.js"></script>

</body>

</html>
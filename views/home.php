<div class="row home p-5">
    <div class="col-md-6 home_presentation d-flex flex-column justify-content-center align-items-start">
        <h1>Welcome to this Demo Ecommerce</h1>
        <p class="mt-5">Ce projet à pour but de présenter une trame possible de développement PHP, Orienté Objet</p>
        <a href="#descriptions" class="btn btn-green">Lire la suite</a>
    </div>
    <div class="col-md-6">
        <img src="<?= Application::$root ?>images\lala-azizli-tfNyTfJpKvc-unsplash.jpg" class="img-fluid rounded" alt="image who shows developers in work">
        <span class="credit_image">Photo by <a href="https://unsplash.com/@lazizli?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Lala Azizli</a> on <a href="https://unsplash.com/s/photos/developers?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
    </div>
    <div class="col-md-6 mx-auto" id="descriptions">
        <h2 class="home_title">Qui a donc réalisé ce projet ?</h2>
        <ul class="ml-5">
            <li>Sofiane</li>
            <li>Jonathan</li>
            <li>Flavien</li>
        </ul>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
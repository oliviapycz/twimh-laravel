@extends('layouts.app')

@section('content')

<div class="container-fluid ">
    <section id="" class="title-section">
        <h2>About</h2>
    </section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header row justify-content-center">
                <p>This Side Project was meant to learn how to use Laravel</p>
                <p>So in the following lines you'll find informations on how I proceed.</p>
                <p>If you're not a developer you may want to skip this page. </p>
              </div>
              <div class="card-body row">
                <section class="col-md-12 row">
                    <h4 class="col-md-12">Install Laravel</h4>
                    <div class="code col-md-8  offset-md-2"><p>composer create-project --prefer-dist laravel/laravel name-of-your-project</p></div>
                    <ul class="col-md-8 offset-md-2">
                      <li> Requiert d'avoir composer installé au préalable sur sa machine</li>
                      <li> <a href="https://laravel.com/docs/5.6/installation">Laravel Official Link</a></li>
                    </ul>
                    <div class="code col-md-8  offset-md-2"><p>php artisan serve</p></div>
                    <ul class="col-md-8 offset-md-2">
                      <li> Lance le serveur</li>
                    </ul>  
                </section>
                <section class="col-md-12 row">
                    <h4 class="col-md-12">Create Auth</h4>
                    <div class="code col-md-8  offset-md-2"><p>php artisan make:auth</p></div>
                    <ul class="col-md-8 offset-md-2">
                        <li> Génère le UserController</li>
                        <li> Génère le dossier auth dans resources/views avec les vues de login/register et autres</li>
                        <li>Dans database/migrations le schema est crée</li>
                    </ul>
                </section>
                <section class="col-md-12 row">
                    <h4 class="col-md-12">Create Controller</h4>
                    <div class="code col-md-8  offset-md-2"><p>php artisan make:controller PostsController --resource</p></div>
                    <ul class="col-md-8 offset-md-2">
                        <li> Génère le PostsController</li>
                        <li> Les fonctions sont générées grâce à l'utilisation de --resource</li>
                    </ul>
                </section>
                <section class="col-md-12 row">
                    <h4 class="col-md-12">Create Model</h4>
                    <div class="code col-md-8  offset-md-2"><p>php artisan make:model Post -m</p></div>
                    <ul class="col-md-8 offset-md-2">
                        <li> Génère le modèle, par convention nommé au singulier</li>
                        <li> -m va générer une migration dans database/migrations pour créer la table</li>
                    </ul>
                </section>
                <section class="col-md-12 row">
                        <h4 class="col-md-12">Create Connection to Database</h4>
                        <ul class="col-md-8 offset-md-2">
                            <li>Dans le fichier .env modifier les params </li>
                            <li>Dans votre BDD créer votre base</li>
                        </ul>
                        <div class="ide col-md-8  offset-md-2">
                            <p>
                                <ul>
                                    <li>DB_CONNECTION=mysql</li>
                                    <li>DB_HOST=127.0.0.1</li>
                                    <li>DB_PORT=3306</li>
                                    <li>DB_DATABASE=your-database-name</li>
                                    <li>DB_USERNAME=your-username</li>
                                    <li>DB_PASSWORD=your-password</li>
                                </ul>
                            </p>
                        </div>
                        
                    </section>
                <section class="col-md-12 row">
                    <h4 class="col-md-12">Create Table</h4>
                    <ul class="col-md-8 offset-md-2">
                        <li> Dans database/migrations 2018_06_16_100029_create_posts_table.php</li>
                    </ul>
                    <div class="ide col-md-8  offset-md-2"><p>
                            public function up() {
                                <ul>
                                    <li>Schema::create('posts', function (Blueprint $table) {</li>
                                        <ul>
                                            <li>$table->increments('id');</li>
                                            <li>$table->string('country');</li>
                                            <li>$table->string('title');</li>
                                            <li>$table->mediumText('description');></li>
                                            <li>$table->text('body');</li>
                                            <li>$table->string('cover_image');</li>
                                            <li>$table->integer('user_id');</li>
                                            <li>$table->timestamps();</li>
                                        </ul>
                                    });
                                </ul>
                            }
                        </p></div>
                </section>
                <section class="col-md-12 row">
                    <h4 class="col-md-12">Running Migration</h4>
                    <div class="code col-md-8  offset-md-2"><p>php artisan migrate</p></div>
                    <ul class="col-md-8 offset-md-2">
                        <li> Génère la table Posts dans votre BDD</li>
                    </ul>
                </section>
                <section class="col-md-12 row">
                    <h4 class="col-md-12">Add Field on Table</h4>
                    <ul class="col-md-8 offset-md-2">
                            <li>Si on oublie un champ dans la table il faut refaire une migration</li>
                        </ul>
                    <div class="code col-md-8  offset-md-2"><p>php artisan make:migration add_field_to_posts</p></div>
                    <ul class="col-md-8 offset-md-2">
                        <li> Dans database/migrations 2018_06_16_100029_add_field_to_posts.php</li>
                    </ul>
                    <div class="ide col-md-8  offset-md-2"><p>
                            public function up() {
                                <ul>
                                    <li>Schema::table('recipes', function (Blueprint $table) {</li>
                                        <ul>
                                            <li>$table->text('field');</li>
                                        </ul>
                                    });
                                </ul>
                            }
                        </p>
                        <p>
                            public function down() {
                                <ul>
                                    <li>Schema::table('recipes', function (Blueprint $table) {</li>
                                        <ul>
                                            <li>$table->dropColumn('field');</li>
                                        </ul>
                                    });
                                </ul>
                            }
                        </p>
                    </div>
                    <div class="code col-md-8  offset-md-2"><p>php artisan migrate</p></div>
                </section>
                <section class="col-md-12 row">
                    <h4 class="col-md-12">Create Route</h4>
                    <ul class="col-md-8 offset-md-2">
                        <li> Dans routes/web.php</li>
                    </ul>
                    <div class="code col-md-8  offset-md-2"><p>Route::resource('posts', 'PostsController');</p></div>
                    <ul class="col-md-8 offset-md-2">
                        <li> Sert toutes les routes posts</li>
                    </ul>
                </section>
              </div>
            </div>
          
        </div>
    </div>
</div>
@endsection


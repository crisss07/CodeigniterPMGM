
<section class="breadcrumb_area blog_banner_two">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle f_48">Elements</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Elements</li>
            </ol>
        </div>
    </div>
</section>

<section class="blog_area">
    <div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h3 class="mb-30 title_color">Iniciar tramite</h3>
                    <form action="#">
                        <div class="row row_alinaer">
                            <div class="col-lg-2 alinear">Tramite : </div>
                            <div class="col-lg-10">
                                <div class="input-group-icon mt-10">
                                    <div class="form-select" id="default-select">
                                        <select>
                                            <option selected="">Escoger</option>
                                            <?php foreach ($tramites as $valores): ?>
                                                <option value="1"><?php echo $valores->tramite; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row_alinaer">
                            <div class="col-lg-2 alinear">Propietario</div>
                            <div class="col-lg-10">
                                <input type="text" name="first_name" required class="single-input">
                            </div>
                        </div>
                        <div class="row row_alinaer">
                            <div class="col-lg-2 alinear">Nro folio</div>
                            <div class="col-lg-10">
                                <input type="text" name="first_name" required class="single-input">
                            </div>
                        </div>
                        <div class="row row_alinaer">
                            <div class="col-lg-2 alinear">.................</div>
                            <div class="col-lg-10">
                                <input type="text" name="first_name" required class="single-input">
                            </div>
                        </div>
                        <div class="row row_alinaer">
                            <div class="col-lg-2 alinear">...................</div>
                            <div class="col-lg-10">
                                <input type="text" name="first_name" required class="single-input">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-4 mt-sm-30 element-wrap">
                    <div class="blog_right_sidebar">
                
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <p>
                            Here, I focus on a range of items and features that we use in life without giving them a second thought.
                            </p>
                            <div class="br"></div>                          
                        </aside>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<style type="text/css">
    .alinear{
        display: flex; 
        align-items: center;
        padding-bottom: 10px;
    }
    .row_alinaer{
        padding-bottom: 10px;
    }
</style>
    
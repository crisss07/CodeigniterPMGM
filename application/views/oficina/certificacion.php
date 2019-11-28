<section class="breadcrumb_area blog_banner_two">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle f_48">Certificacion</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">Oficina virtual</a></li>
                <li class="active">Certificado</li>
            </ol>
        </div>
    </div>
</section>


<style type="text/css">
    body {
  color: #2c3e50;
  background: #ecf0f1;
  padding: 0 1em 1em;
}|

h1 {
  margin: 0;
  line-height: 2;
  text-align: center;
}

h2 {
  margin: 0 0 .5em;
  font-weight: normal;
}

input {
  position: absolute;
  opacity: 0;
  z-index: -1;
}

.row {
  display: flex;
}
.row .col {
  flex: 1;
}
.row .col:last-child {
  margin-left: 1em;
}

/* Accordion styles */
.tabs {
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 0.5);
}

.tab {
  width: 100%;
  color: white;
  overflow: hidden;
}
.tab-label {
  display: flex;
  justify-content: space-between;
  padding: 1em;
  background: #2c3e50;
  font-weight: bold;
  cursor: pointer;
  /* Icon */
}
.tab-label:hover {
  background: #1a252f;
}
.tab-label::after {
  content: "\276F";
  width: 1em;
  height: 1em;
  text-align: center;
  transition: all .35s;
}
.tab-content {
  max-height: 0;
  padding: 0 1em;
  color: #2c3e50;
  background: white;
  transition: all .35s;
}
.tab-close {
  display: flex;
  justify-content: flex-end;
  padding: 1em;
  font-size: 0.75em;
  background: #2c3e50;
  cursor: pointer;
}
.tab-close:hover {
  background: #1a252f;
}

input:checked + .tab-label {
  background: #1a252f;
}
input:checked + .tab-label::after {
  -webkit-transform: rotate(90deg);
          transform: rotate(90deg);
}
input:checked ~ .tab-content {
  max-height: 100vh;
  padding: 1em;
}

</style>

<div class="whole-wrap">
    <div class="container">
       
        <div class="section-top-border">
            <?php $cont =0 ?>
            <div class="row">
            	<div style="width: 100%; text-align: center;">
            		<h3>El certificado es valido</h3>
            	</div>
				<div style="text-align: center; width: 100%">
					<img src="<?php echo base_url(); ?>public/assets/images/oficina/certificado.jpg" alt="Logo" width="350"  class="logo"/>
				</div>	                
                
            </div>
        </div>
       
    </div>
</div>





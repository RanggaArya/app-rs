<section class="breadcrumbs_custom">
   <div class="container breadcrumbs_custom">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>artikel">Artikel</a></li>
            <?php
            foreach ($datapost->result() as $row) { ?>
               <li class="breadcrumb-item active" aria-current="page"><?php echo $row->title; ?></li>
            <?php }
            ?>
         </ol>
      </nav>
   </div>
</section>
<br />
<br />
<section class="section_four_two">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-8 col-xs-12">
            <?php
            foreach ($datapost->result() as $row) { ?>
               <!-- Article Header -->
               <div class="article-header">
                  <h1 class="article-title"><?php echo $row->title; ?></h1>
                  <div class="article-meta">
                     <span class="meta-item">
                        <i class="fa fa-user-circle"></i> Admin
                     </span>
                     <span class="meta-divider">â€¢</span>
                     <span class="meta-item">
                        <i class="fa fa-calendar"></i> <?php echo date('d M Y', strtotime($row->date_created)); ?>
                     </span>
                     <span class="text-muted ml-3" title="<?= $artikel_visitors ?> Orang (Unik)">
                        &nbsp; | &nbsp; <i class="fa fa-user"></i> <?= number_format($artikel_visitors) ?>
                    </span>
                    
                    <span class="text-muted ml-2" title="<?= $artikel_views ?> Kali Dilihat">
                        &nbsp; <i class="fa fa-eye"></i> <?= number_format($artikel_views) ?>
                    </span>
                  </div>
               </div>

               <!-- Featured Image -->
               <div class="article-featured-wrapper">
                  <?php
                  if ($row->image_path == '' || $row->image_path == NULL) { ?>
                     <img src="<?php echo base_url() ?>assets/blog/thumb_img_default/thumb.png"
                        class="article-featured-image" alt="<?php echo $row->title; ?>">
                  <?php } else { ?>
                     <img src="<?php echo base_url() ?>assets/blog/thumb_img/<?php echo $row->image_path; ?>"
                        class="article-featured-image" alt="<?php echo $row->title; ?>">
                  <?php }
                  ?>
               </div>

               <!-- Article Content -->
               <div class="article-content">
                  <?php echo $row->content; ?>
               </div>
            <?php }
            ?>
         </div>
      </div>
   </div>
</section>

<section class="section_social_share">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-8 col-xs-12">
            <h4>Bagikan</h4>
            <br />
            <br />
            <div style="display:flex;" class="share_social">
               <a href="https://api.whatsapp.com/send?text=<?php echo base_url(); ?>artikel/<?php echo $datapost->result()[0]->slug ?>"><img
                     src="https://bilba.go-jek.com/images/v4/custom/blog/whatsapp-social-icon-circle-color.svg"
                     alt="Whatsapp" /></a>
               <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>artikel/<?php echo $datapost->result()[0]->slug ?>"><img
                     src="<?= base_url(); ?>assets/frontview/img/fb.png" alt="facebook" width="40px" /></a>
               <a href="https://twitter.com/intent/tweet?text=<?php echo base_url(); ?>artikel/<?php echo $datapost->result()[0]->slug ?>"><img
                     src="https://bilba.go-jek.com/images/v4/custom/blog/twitter-social-icon-circle-color.svg"
                     alt="Twitter" /></a>
            </div>
         </div>
      </div>
      <br />
      <div class="row">
         <div class="col-lg-8 col-md-8 col-xs-12">
            <div id="disqus_thread"></div>
            <script>
               (function() {
                  var d = document,
                     s = d.createElement('script');
                  s.src = 'https://rsarrasyidpalembang.disqus.com/embed.js';
                  s.setAttribute('data-timestamp', +new Date());
                  (d.head || d.body).appendChild(s);
               })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered
                  by Disqus.</a></noscript>
         </div>
      </div>
   </div>
</section>

<!-- Section Artikel Lainnya dengan Carousel -->
<section class="section_related_articles py-5" style="background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);">
   <div class="container">
      <div class="row mb-4">
         <div class="col-12 text-center">
            <h3 class="section-title-carousel">
               Artikel Lainnya
            </h3>
            <p class="section-subtitle-carousel">Temukan artikel menarik lainnya untuk Anda</p>
         </div>
      </div>

      <div class="row">
         <div class="col-12">
            <div id="related_articles_carousel" class="owl-carousel owl-theme">
               <!-- Loading State -->
               <div class="carousel-loading">
                  <div class="custom-spinner"></div>
                  <p>Memuat artikel...</p>
               </div>
            </div>
         </div>
      </div>

      <div class="row mt-4">
         <div class="col-12 text-center">
            <a href="<?php echo base_url('artikel'); ?>" class="btn-view-all-carousel">
               <span>Lihat Semua Artikel</span>
               <i class="fa fa-arrow-right"></i>
            </a>
         </div>
      </div>
   </div>
</section>

<style>
/* ============================================
   ARTICLE HEADER STYLES
   ============================================ */
.article-header {
   margin-bottom: 30px;
   padding-bottom: 20px;
   border-bottom: 2px solid #f0f0f0;
}

.article-title {
   font-size: 2rem;
   font-weight: 800;
   color: #1a1a1a;
   line-height: 1.3;
   margin-bottom: 15px;
}

.article-meta {
   display: flex;
   align-items: center;
   gap: 10px;
   font-size: 0.9rem;
   color: #6c757d;
}

.meta-item {
   display: flex;
   align-items: center;
   gap: 6px;
}

.meta-item i {
   color: #27ae60;
}

.meta-divider {
   color: #dee2e6;
}

/* ============================================
   FEATURED IMAGE STYLES
   ============================================ */
.article-featured-wrapper {
   margin: 30px 0;
   border-radius: 15px;
   overflow: hidden;
   box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.article-featured-image {
   width: 100%;
   height: auto;
   max-height: 450px;
   object-fit: cover;
   display: block;
   transition: transform 0.3s ease;
}

.article-featured-wrapper:hover .article-featured-image {
   transform: scale(1.02);
}

/* ============================================
   ARTICLE CONTENT STYLES
   ============================================ */
.article-content {
   font-size: 1.05rem;
   line-height: 1.8;
   color: #333;
   margin-top: 30px;
}

.article-content p {
   margin-bottom: 20px;
   text-align: justify;
}

/* Clear float untuk gambar */
.article-content::after {
   content: "";
   display: table;
   clear: both;
}

/* Reset semua inline width dari CKEditor */
.article-content * {
   max-width: 100%;
}

.article-content img {
   max-width: 60% !important;
}

/* Images in Content */
.article-content img {
   max-width: 60% !important;
   width: auto !important;
   height: auto !important;
   border-radius: 10px;
   margin: 25px auto !important;
   display: block !important;
   box-shadow: 0 4px 15px rgba(0,0,0,0.1);
   transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.article-content img:hover {
   transform: scale(1.02);
   box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

/* Override inline styles dari CKEditor */
.article-content p img,
.article-content div img,
.article-content figure img {
   max-width: 60% !important;
   width: auto !important;
   margin-left: auto !important;
   margin-right: auto !important;
   display: block !important;
}

/* Image Caption Styling */
.article-content figcaption {
   text-align: center;
   font-size: 0.85rem;
   color: #6c757d;
   font-style: italic;
   margin-top: 10px;
   margin-bottom: 20px;
}

/* Jika caption menggunakan paragraph dengan style khusus */
.article-content p[style*="text-align: center"],
.article-content p[style*="text-align:center"] {
   text-align: center !important;
   font-size: 0.85rem;
   color: #6c757d;
   font-style: italic;
   margin-top: -15px;
   margin-bottom: 25px;
}

/* Style untuk figure element */
.article-content figure {
   margin: 25px auto;
   text-align: center;
}

.article-content figure img {
   margin-bottom: 10px;
}

/* Headings in Content */
.article-content h1,
.article-content h2,
.article-content h3,
.article-content h4,
.article-content h5,
.article-content h6 {
   margin-top: 35px;
   margin-bottom: 18px;
   font-weight: 700;
   color: #1a1a1a;
   line-height: 1.3;
}

.article-content h1 {
   font-size: 1.85rem;
   border-bottom: 3px solid #27ae60;
   padding-bottom: 12px;
}

.article-content h2 {
   font-size: 1.65rem;
   border-bottom: 3px solid #27ae60;
   padding-bottom: 10px;
}

.article-content h3 {
   font-size: 1.4rem;
   color: #27ae60;
}

.article-content h4 {
   font-size: 1.2rem;
}

.article-content h5 {
   font-size: 1.1rem;
}

.article-content h6 {
   font-size: 1rem;
   color: #555;
}

/* Lists in Content */
.article-content ul,
.article-content ol {
   margin-bottom: 20px;
   padding-left: 30px;
   line-height: 1.8;
}

.article-content li {
   margin-bottom: 12px;
   text-align: justify;
}

.article-content ul li {
   list-style-type: disc;
}

.article-content ol li {
   list-style-type: decimal;
}

/* Links in Content */
.article-content a {
   color: #27ae60;
   text-decoration: underline;
   transition: color 0.3s ease;
   font-weight: 500;
}

.article-content a:hover {
   color: #229954;
   text-decoration: none;
}

/* Blockquote in Content */
.article-content blockquote {
   border-left: 4px solid #27ae60;
   padding-left: 20px;
   margin: 25px 0;
   font-style: italic;
   color: #555;
   background: #f8f9fa;
   padding: 20px 25px;
   border-radius: 8px;
   box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.article-content blockquote p {
   margin-bottom: 0;
}

/* Tables in Content */
.article-content table {
   width: 100%;
   margin: 25px 0;
   border-collapse: collapse;
   box-shadow: 0 2px 15px rgba(0,0,0,0.08);
   border-radius: 8px;
   overflow: hidden;
}

.article-content table th {
   background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
   color: white;
   padding: 12px 15px;
   text-align: left;
   font-weight: 600;
}

.article-content table td {
   padding: 12px 15px;
   border-bottom: 1px solid #e9ecef;
}

.article-content table tr:nth-child(even) {
   background: #f8f9fa;
}

.article-content table tr:hover {
   background: #e8f5e9;
}

/* Code in Content */
.article-content code {
   background: #f4f4f4;
   padding: 2px 6px;
   border-radius: 4px;
   font-family: 'Courier New', monospace;
   font-size: 0.9em;
   color: #e83e8c;
}

.article-content pre {
   background: #2d3748;
   color: #e2e8f0;
   padding: 20px;
   border-radius: 8px;
   overflow-x: auto;
   margin: 25px 0;
   box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.article-content pre code {
   background: transparent;
   color: inherit;
   padding: 0;
}

/* Horizontal Rule */
.article-content hr {
   margin: 30px 0;
   border: none;
   border-top: 2px solid #e9ecef;
}

/* Strong and Em */
.article-content strong {
   font-weight: 700;
   color: #1a1a1a;
}

.article-content em {
   font-style: italic;
}

/* ============================================
   CAROUSEL STYLES
   ============================================ */

/* Section Title */
.section-title-carousel {
   font-size: 1.8rem;
   font-weight: 800;
   color: #2c3e50;
   margin-bottom: 5px;
   position: relative;
   display: inline-block;
}

.section-subtitle-carousel {
   color: #6c757d;
   font-size: 0.95rem;
   font-weight: 400;
   margin-bottom: 0;
}

/* Loading Spinner */
.carousel-loading {
   text-align: center;
   padding: 40px 20px;
}

.custom-spinner {
   width: 40px;
   height: 40px;
   margin: 0 auto 15px;
   border: 3px solid #f3f3f3;
   border-top: 3px solid #27ae60;
   border-radius: 50%;
   animation: spin 1s linear infinite;
}

@keyframes spin {
   0% { transform: rotate(0deg); }
   100% { transform: rotate(360deg); }
}

/* Carousel Card */
.carousel-card {
   background: white;
   border-radius: 12px;
   overflow: hidden;
   box-shadow: 0 4px 15px rgba(0,0,0,0.08);
   transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
   margin: 10px;
   height: 360px;
   display: flex;
   flex-direction: column;
}

.carousel-card:hover {
   transform: translateY(-10px);
   box-shadow: 0 15px 40px rgba(39, 174, 96, 0.3);
}

.carousel-card-img {
   height: 160px;
   overflow: hidden;
   position: relative;
}

.carousel-card-img img {
   width: 100%;
   height: 100%;
   object-fit: cover;
   transition: transform 0.5s ease;
}

.carousel-card:hover .carousel-card-img img {
   transform: scale(1.15) rotate(2deg);
}

.carousel-card-overlay {
   position: absolute;
   top: 10px;
   right: 10px;
   background: rgba(39, 174, 96, 0.9);
   color: white;
   padding: 5px 12px;
   border-radius: 20px;
   font-size: 0.75rem;
   font-weight: 600;
   backdrop-filter: blur(5px);
}

.carousel-card-body {
   padding: 15px;
   flex: 1;
   display: flex;
   flex-direction: column;
}

.carousel-card-title {
   font-size: 0.95rem;
   font-weight: 700;
   line-height: 1.3;
   margin-bottom: 10px;
   display: -webkit-box;
   -webkit-line-clamp: 2;
   -webkit-box-orient: vertical;
   overflow: hidden;
   color: #2c3e50;
   min-height: 42px;
}

.carousel-card-title a {
   color: inherit;
   text-decoration: none;
   transition: color 0.3s ease;
}

.carousel-card-title a:hover {
   color: #27ae60;
}

.carousel-card-excerpt {
   color: #6c757d;
   font-size: 0.85rem;
   line-height: 1.5;
   display: -webkit-box;
   -webkit-line-clamp: 2;
   -webkit-box-orient: vertical;
   overflow: hidden;
   margin-bottom: 12px;
   flex: 1;
}

.carousel-card-footer {
   display: flex;
   justify-content: space-between;
   align-items: center;
   padding-top: 12px;
   border-top: 1px solid #e9ecef;
   margin-top: auto;
}

.carousel-card-date {
   font-size: 0.75rem;
   color: #95a5a6;
   font-weight: 500;
   display: flex;
   align-items: center;
   gap: 5px;
}

.carousel-card-link {
   color: white;
   background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
   text-decoration: none;
   font-weight: 600;
   font-size: 0.8rem;
   padding: 6px 16px;
   border-radius: 20px;
   transition: all 0.3s ease;
   box-shadow: 0 3px 12px rgba(39, 174, 96, 0.3);
}

.carousel-card-link:hover {
   transform: translateY(-2px);
   box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
   text-decoration: none;
   color: white;
}

/* Owl Carousel Custom Navigation */
.owl-carousel .owl-nav {
   position: absolute;
   top: 50%;
   transform: translateY(-50%);
   width: 100%;
   left: 0;
   right: 0;
}

.owl-carousel .owl-nav button.owl-prev,
.owl-carousel .owl-nav button.owl-next {
   width: 55px;
   height: 55px;
   background: white !important;
   border-radius: 50% !important;
   position: absolute;
   box-shadow: 0 5px 20px rgba(0,0,0,0.15) !important;
   transition: all 0.3s ease !important;
   border: 2px solid #e9ecef !important;
   display: flex !important;
   align-items: center !important;
   justify-content: center !important;
   line-height: 1 !important;
   padding: 0 !important;
}

.owl-carousel .owl-nav button.owl-prev span,
.owl-carousel .owl-nav button.owl-next span {
   font-size: 28px;
   color: #27ae60;
   font-weight: bold;
   line-height: 1;
}

.owl-carousel .owl-nav button.owl-prev:hover,
.owl-carousel .owl-nav button.owl-next:hover {
   background: linear-gradient(135deg, #27ae60 0%, #229954 100%) !important;
   border-color: #27ae60 !important;
   transform: scale(1.15) !important;
   box-shadow: 0 8px 25px rgba(39, 174, 96, 0.4) !important;
}

.owl-carousel .owl-nav button.owl-prev:hover span,
.owl-carousel .owl-nav button.owl-next:hover span {
   color: white;
}

.owl-carousel .owl-nav button.owl-prev {
   left: -25px;
}

.owl-carousel .owl-nav button.owl-next {
   right: -25px;
}

.owl-carousel .owl-nav button:focus {
   outline: none;
}

/* Owl Carousel Dots */
.owl-carousel .owl-dots {
   text-align: center;
   margin-top: 25px;
   padding: 5px 0;
   display: flex;
   justify-content: center;
   align-items: center;
   gap: 10px;
}

.owl-carousel .owl-dot {
   display: inline-block;
   width: 10px;
   height: 10px;
   background: #cbd5e0 !important;
   border-radius: 50%;
   margin: 0;
   transition: all 0.3s ease;
   border: none;
   padding: 0;
   cursor: pointer;
   flex-shrink: 0;
}

.owl-carousel .owl-dot:hover {
   background: #a0aec0 !important;
}

.owl-carousel .owl-dot.active {
   background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%) !important;
   width: 14px;
   height: 14px;
   box-shadow: 0 2px 8px rgba(46, 204, 113, 0.3);
}

.owl-carousel .owl-dot:focus {
   outline: none;
}

/* Button View All */
.btn-view-all-carousel {
   display: inline-flex;
   align-items: center;
   gap: 8px;
   padding: 10px 28px;
   background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
   color: white;
   text-decoration: none;
   border-radius: 25px;
   font-size: 0.9rem;
   font-weight: 700;
   transition: all 0.4s ease;
   box-shadow: 0 6px 15px rgba(39, 174, 96, 0.4);
   position: relative;
   overflow: hidden;
}

.btn-view-all-carousel::before {
   content: '';
   position: absolute;
   top: 0;
   left: -100%;
   width: 100%;
   height: 100%;
   background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
   transition: left 0.5s ease;
}

.btn-view-all-carousel:hover::before {
   left: 100%;
}

.btn-view-all-carousel:hover {
   transform: translateY(-3px);
   box-shadow: 0 12px 30px rgba(39, 174, 96, 0.5);
   color: white;
   text-decoration: none;
}

.btn-view-all-carousel i {
   transition: transform 0.3s ease;
}

.btn-view-all-carousel:hover i {
   transform: translateX(5px);
}

/* ============================================
   RESPONSIVE STYLES
   ============================================ */
@media (max-width: 991px) {
   .section-title-carousel {
      font-size: 1.6rem;
   }
   
   .section-subtitle-carousel {
      font-size: 0.9rem;
   }
   
   .article-title {
      font-size: 1.75rem;
   }
   
   .article-featured-image {
      max-height: 400px;
   }
   
   .article-content {
      font-size: 1rem;
   }
   
   .article-content img {
      max-width: 70%;
   }
   
   .article-content h1 {
      font-size: 1.65rem;
   }
   
   .article-content h2 {
      font-size: 1.5rem;
   }
   
   .article-content h3 {
      font-size: 1.3rem;
   }
   
   .carousel-card {
      height: 340px;
   }
   
   .owl-carousel .owl-nav button.owl-prev,
   .owl-carousel .owl-nav button.owl-next {
      width: 45px;
      height: 45px;
   }
   
   .owl-carousel .owl-nav button.owl-prev span,
   .owl-carousel .owl-nav button.owl-next span {
      font-size: 24px;
   }
   
   .owl-carousel .owl-nav button.owl-prev {
      left: -15px;
   }
   
   .owl-carousel .owl-nav button.owl-next {
      right: -15px;
   }
}

@media (max-width: 767px) {
   .section-title-carousel {
      font-size: 1.4rem;
   }
   
   .section-subtitle-carousel {
      font-size: 0.85rem;
   }
   
   .article-title {
      font-size: 1.5rem;
   }
   
   .article-meta {
      flex-wrap: wrap;
      font-size: 0.85rem;
   }
   
   .article-featured-image {
      max-height: 300px;
   }
   
   .article-content {
      font-size: 0.95rem;
      line-height: 1.7;
   }
   
   .article-content img {
      max-width: 85%;
   }
   
   /* Override untuk mobile */
   .article-content p img,
   .article-content div img {
      max-width: 85% !important;
   }
   
   .article-content h1 {
      font-size: 1.5rem;
   }
   
   .article-content h2 {
      font-size: 1.4rem;
   }
   
   .article-content h3 {
      font-size: 1.2rem;
   }
   
   .article-content table {
      font-size: 0.85rem;
   }
   
   .article-content table th,
   .article-content table td {
      padding: 8px 10px;
   }
   
   .carousel-card {
      height: 320px;
      margin: 5px;
   }
   
   .carousel-card-img {
      height: 140px;
   }
   
   .carousel-card-body {
      padding: 12px;
   }
   
   .carousel-card-title {
      font-size: 0.9rem;
      min-height: 38px;
   }
   
   .carousel-card-excerpt {
      font-size: 0.8rem;
   }
   
   .owl-carousel .owl-nav button.owl-prev,
   .owl-carousel .owl-nav button.owl-next {
      width: 40px;
      height: 40px;
      border: 1px solid #e9ecef !important;
   }
   
   .owl-carousel .owl-nav button.owl-prev span,
   .owl-carousel .owl-nav button.owl-next span {
      font-size: 20px;
   }
   
   .owl-carousel .owl-nav button.owl-prev {
      left: 5px;
   }
   
   .owl-carousel .owl-nav button.owl-next {
      right: 5px;
   }
   
   .btn-view-all-carousel {
      padding: 8px 22px;
      font-size: 0.85rem;
   }
}

@media (max-width: 576px) {
   .carousel-card {
      height: auto;
      min-height: 300px;
   }
   
   .article-content img {
      max-width: 100%;
   }
   
   /* Override untuk extra small mobile */
   .article-content p img,
   .article-content div img,
   .article-content figure img {
      max-width: 100% !important;
   }
   
   .article-content h1 {
      font-size: 1.4rem;
   }
   
   .article-content h2 {
      font-size: 1.3rem;
   }
   
   .article-content h3 {
      font-size: 1.15rem;
   }
   
   .article-content h4 {
      font-size: 1.05rem;
   }
   
   .carousel-card-footer {
        display: flex;
        justify-content: space-between; /* Kiri dan Kanan mentok */
        align-items: center;
        padding-top: 12px;
        border-top: 1px solid #e9ecef;
        margin-top: auto;
        font-size: 0.8rem; /* Ukuran font sedikit dikecilkan agar muat */
    }
    
    .carousel-card-date {
        color: #95a5a6;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    /* Class baru untuk statistik di carousel */
    .carousel-card-stats {
        display: flex;
        gap: 10px;
        color: #7f8c8d;
        font-weight: 600;
    }
}
</style>

<!-- jQuery - Load dulu jika belum ada -->
<script>
if (typeof jQuery === 'undefined') {
   document.write('<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"><\/script>');
}
</script>

<!-- Owl Carousel CSS & JS - Load setelah jQuery -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
// Tunggu sampai jQuery dan Owl Carousel fully loaded
(function() {
   function initCarousel() {
      if (typeof jQuery === 'undefined') {
         setTimeout(initCarousel, 100);
         return;
      }
      
      if (typeof jQuery.fn.owlCarousel === 'undefined') {
         setTimeout(initCarousel, 100);
         return;
      }
      
      jQuery(document).ready(function($) {
         loadRelatedArticles();
      });
   }
   
   initCarousel();
})();

function loadRelatedArticles() {
   <?php 
   // Ambil ID dan slug artikel saat ini
   foreach ($datapost->result() as $row) {
      $current_id = $row->blog_id ?? 0;
   }
   ?>
   
   var currentArticleId = <?php echo $current_id; ?>;
   
   jQuery.ajax({
      url: "<?php echo base_url(); ?>blog/get_related_articles",
      type: "POST",
      data: {
         current_id: currentArticleId,
         limit: 8
      },
      dataType: "json",
      success: function(data) {
         let html = '';
         
         if (data.length > 0) {
            for(let i = 0; i < data.length; i++) {
               let article = data[i];
               let articleUrl = "<?php echo base_url(); ?>artikel/" + article.slug;
               let thumb = (article.image_path && article.image_path !== "") ? article.image_path : "thumb.png";
               let imageUrl = "<?php echo base_url(); ?>assets/blog/thumb_img/" + thumb;
               
               // Buat excerpt
               let textContent = article.content ? article.content.replace(/<[^>]+>/g, '') : article.title;
               let excerpt = textContent.substring(0, 85).trim() + '...';
               
               // Format tanggal
               let formattedDate = article.date_created;
               try {
                  let dateObj = new Date(article.date_created);
                  formattedDate = dateObj.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
               } catch(e) {}

               // Format Angka Statistik (Ribuan)
               let v_count = article.visitors ? parseInt(article.visitors).toLocaleString('id-ID') : '0';
               let view_count = article.views ? parseInt(article.views).toLocaleString('id-ID') : '0';
                   
               html += `
                  <div class="carousel-card">
                     <div class="carousel-card-img">
                        <a href="${articleUrl}">
                           <img src="${imageUrl}" alt="${article.title}" loading="lazy" 
                                onerror="this.src='<?php echo base_url() ?>assets/blog/thumb_img_default/thumb.png'">
                        </a>
                        <div class="carousel-card-overlay">📖 Artikel</div>
                     </div>
                     <div class="carousel-card-body">
                        <h5 class="carousel-card-title">
                           <a href="${articleUrl}">${article.title}</a>
                        </h5>
                        <p class="carousel-card-excerpt">${excerpt}</p>
                        
                        <div class="carousel-card-footer">
                           <span class="carousel-card-date">
                              <i class="fa fa-calendar"></i> ${formattedDate}
                           </span>
                           
                           <div class="carousel-card-stats">
                               <span title="Visitors">
                                   <i class="fa fa-user" style="color: #27ae60;"></i> ${v_count}
                               </span>
                               <span title="Views">
                                   <i class="fa fa-eye" style="color: #2980b9;"></i> ${view_count}
                               </span>
                           </div>
                        </div>
                     </div>
                  </div>
               `;
            }
            
            jQuery('#related_articles_carousel').html(html);
            
            // Initialize Owl Carousel
            jQuery('#related_articles_carousel').owlCarousel({
               loop: data.length > 3,
               margin: 20,
               nav: true,
               dots: true,
               autoplay: true,
               autoplayTimeout: 4000,
               autoplayHoverPause: true,
               smartSpeed: 800,
               navText: ["<span>‹</span>", "<span>›</span>"],
               responsive: {
                  0: { items: 1, nav: true, margin: 10 },
                  576: { items: 2, nav: true },
                  992: { items: 3, nav: true }
               }
            });
         } else {
            jQuery('#related_articles_carousel').html(`
               <div class="carousel-loading">
                  <p style="color: #6c757d; font-size: 1.1rem;">Belum ada artikel lainnya.</p>
               </div>
            `);
         }
      },
      error: function() {
         jQuery('#related_articles_carousel').html(`
            <div class="carousel-loading">
               <p style="color: #dc3545; font-size: 1.1rem;">
                  <i class="fa fa-exclamation-circle"></i> Tidak dapat memuat artikel saat ini.
               </p>
            </div>
         `);
      }
   });
}
</script>
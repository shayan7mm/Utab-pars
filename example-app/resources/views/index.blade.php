@extends('layouts.ClientLayouts.master')  <!-- این خط برای استفاده از layout کلی است -->
<title>شرکت دیجیتال مارکتینگ یوتاب پارس</title>
<meta content="" name="description">
<meta content="" name="keywords">
@section('content')

  <!-- ======= Hero Section ======= -->
  

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/clients/client-1.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/clients/client-2.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/clients/client-3.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/clients/client-4.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/clients/client-5.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/clients/client-6.png') }}" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about" dir="rtl">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>درباره ما</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              یوتاب پارس یک آژانس دیجیتال مارکتینگ خلاق است که با تمرکز بر استراتژی، محتوا و فناوری، به رشد کسب‌وکارها در فضای آنلاین کمک می‌کند.
            </p>
            <ul>
              <li> تخصص ما: بازاریابی دیجیتال داده‌محور و خلاقانه</li>
              <li>ماموریت ما: رشد پایدار برندها در دنیای آنلاین</li>
              <li> ارزش ما: شفافیت، تعهد و نتیجه‌محوری</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              شرکت دیجیتال مارکتینگ یوتاب پارس با هدف ارتقاء برندها در دنیای دیجیتال تأسیس شده و با بهره‌گیری از تیمی متخصص در زمینه‌های بازاریابی محتوا، سئو، تبلیغات آنلاین، طراحی وب‌سایت و مدیریت شبکه‌های اجتماعی، به کسب‌وکارها کمک می‌کند تا در بازارهای هدف خود دیده شوند و رشد کنند. ما با تحلیل داده‌محور، خلاقیت در اجرا و تعهد به نتایج، کمپین‌هایی طراحی می‌کنیم که هم تأثیرگذار و هم قابل اندازه‌گیری باشند.
              در یوتاب پارس، باور داریم که موفقیت مشتریان‌ ما، موفقیت ماست — و برای آن، هر روز در حال یادگیری، نوآوری و بهبود هستیم.
            </p>
            <a href="#" class="btn-learn-more">خواندن بیشتر</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">
    
        <div class="row">
    
          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
    
            <div class="content">
              <h3>چرا <strong>یوتاب پارس</strong> را انتخاب کنید؟</h3>
              <p>
                یوتاب پارس با ترکیب خلاقیت، تحلیل داده و فناوری، خدمات تخصصی دیجیتال مارکتینگ و طراحی سایت را برای رشد برندها در فضای آنلاین ارائه می‌دهد.
              </p>
            </div>
    
            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> آیا خدمات یوتاب پارس فقط برای برندهای بزرگ است؟ <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      نه، ما برای استارتاپ‌ها، کسب‌وکارهای کوچک و برندهای بزرگ راه‌حل‌های متناسب ارائه می‌کنیم تا در بازار دیجیتال بدرخشند.
                    </p>
                  </div>
                </li>
    
                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> چه خدماتی در حوزه طراحی سایت ارائه می‌دهید؟ <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      از طراحی سایت شرکتی و فروشگاهی گرفته تا پورتال‌های اختصاصی با UI/UX حرفه‌ای و بهینه‌سازی کامل برای موتورهای جستجو.
                    </p>
                  </div>
                </li>
    
                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> در زمینه دیجیتال مارکتینگ چه خدماتی دارید؟ <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      از سئو، تبلیغات گوگل، مدیریت شبکه‌های اجتماعی تا تولید محتوای هدفمند، همه را یکجا در یوتاب پارس تجربه کنید.
                    </p>
                  </div>
                </li>
    
              </ul>
            </div>
    
          </div>
    
          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("{{ asset('img/why-us.png') }}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>
    
      </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">
    
        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset('img/skills.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>مهارت‌های کلیدی تیم یوتاب پارس</h3>
            <p class="fst-italic">
              تیم ما با بهره‌گیری از دانش روز، تجربه بالا و ابزارهای حرفه‌ای، راهکارهایی دقیق و موثر در فضای دیجیتال ارائه می‌دهد.
            </p>
    
            <div class="skills-content">
    
              <div class="progress">
                <span class="skill">طراحی و توسعه وب (HTML/CSS) <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
    
              <div class="progress">
                <span class="skill">بهینه‌سازی سئو و سرعت سایت <i class="val">95%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
    
              <div class="progress">
                <span class="skill">بازاریابی دیجیتال و شبکه‌های اجتماعی <i class="val">85%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
    
              <div class="progress">
                <span class="skill">طراحی گرافیک و هویت بصری <i class="val">70%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
    
            </div>
    
          </div>
        </div>
    
      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
    
        <div class="section-title">
          <h2>خدمات ما</h2>
          <p>در یوتاب پارس، با تکیه بر تخصص، خلاقیت و تجربه، خدماتی جامع در حوزه طراحی سایت، بازاریابی دیجیتال و بهینه‌سازی سئو ارائه می‌دهیم تا کسب‌وکار شما را در مسیر رشد دیجیتال همراهی کنیم.</p>
        </div>
       
        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-code-alt"></i></div>
              @foreach($service as $services)
              @if($services->id == 15)
              <h4><a href="#">{{ $services->name }}</a></h4>
              <p>{{ $services->description }}</p>
              @endif
              @endforeach
            </div>
          </div>
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-bar-chart-alt"></i></div>
              @foreach($service as $services)
              @if($services->id == 16)
              <h4><a href="#">{{ $services->name }}</a></h4>
              <p>{{ $services->description }}</p>
              @endif
              @endforeach
            </div>
          </div>
    
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-bullseye"></i></div>
              @foreach($service as $services)
              @if($services->id == 17)
              <h4><a href="#">{{ $services->name }}</a></h4>
              <p>{{ $services->description }}</p>
              @endif
              @endforeach
            </div>
          </div>
    
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-palette"></i></div>
              @foreach($service as $services)
              @if($services->id == 18)
              <h4><a href="#">{{ $services->name }}</a></h4>
              <p>{{ $services->description }}</p>
              @endif
              @endforeach
            </div>
          </div>
         
        </div>
      
      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">
    
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>ما را در اینستاگرام دنبال کنید</h3>
            <p>جدیدترین نمونه‌کارها، نکات آموزشی در زمینه طراحی سایت و دیجیتال مارکتینگ، و پشت صحنه پروژه‌ها را در پیج اینستاگرام یوتاب پارس ببینید. همراه ما باشید!</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="https://www.instagram.com/YourInstagramPage" target="_blank">مشاهده صفحه</a>
          </div>
        </div>
    
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
    
        <div class="section-title text-center">
          <h2>نمونه‌کارها</h2>
          <p>
            در یوتاب پارس، ما با بهره‌گیری از استراتژی‌های نوین دیجیتال مارکتینگ، طراحی وب‌سایت، تولید محتوا، سئو و تبلیغات هدفمند، به برندها کمک می‌کنیم تا دیده شوند و رشد کنند. در این بخش برخی از پروژه‌های موفق ما را مشاهده می‌کنید.
          </p>
        </div>
    
        {{-- دکمه فیلتر حذف شده --}}
    
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          @foreach($resumes as $resume)
            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img">
                <img 
                  src="{{ asset('uploads/resumes/' . $resume->featured_image) }}" 
                  class="img-fluid" 
                  alt="{{ $resume->alt ?? $resume->title }}">
              </div>
              <div class="portfolio-info">
                <a href="{{ route('resumes.show', $resume->id) }}">
                <h4>{{ $resume->title }}</h4>
                <p>{{ Str::limit(strip_tags($resume->description), 50) }}</p>
                <a href="{{ asset('uploads/resumes/' . $resume->featured_image) }}" 
                   data-gallery="portfolioGallery" 
                   class="portfolio-lightbox preview-link" >
                   
                  <i class="bx bx-plus"></i>
                </a>
                 
                   class="details-link" 
                   title="جزئیات پروژه">
                  <i class="bx bx-link"></i>
                </a>
              </div>
            </div>
          @endforeach
        </div>
    
      </div>
    </section>
    
    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
    
        <div class="section-title">
          <h2>تیم ما</h2>
          <p>با اعضای تیم حرفه‌ای ما آشنا شوید</p>
        </div>
    
        <div class="row">
          @foreach($teams as $key => $member)
          <div class="col-lg-6 mt-4 {{ $key > 1 ? 'mt-lg-0' : '' }}" data-aos="zoom-in" data-aos-delay="{{ 100 * ($key + 1) }}">
            <div class="member d-flex align-items-start">
              <div class="pic">
                <img src="{{ asset('storage/photos/1/' . $member->image) }}" class="img-fluid" alt="{{ $member->name }}">
              </div>
              <div class="member-info" style="direction: rtl; text-align: right; font-size: 15px; line-height: 2;">
                <p><strong>نام:</strong> {{ $member->name }}</p>
                <p><strong>سمت:</strong> {{ $member->position }}</p>
                <p>
                    <strong style="margin-right: 5px;">توضیحات:</strong>{!! $member->description !!}
                </p>
                <p><strong>تخصص:</strong> {{ $member->specialty }}</p>
            
                <div class="social mt-2">
                    <a href="#"><i class="ri-twitter-fill"></i></a>
                    <a href="#"><i class="ri-facebook-fill"></i></a>
                    <a href="#"><i class="ri-instagram-fill"></i></a>
                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                </div>
            </div>
            
            </div>
          </div>
          @endforeach
        </div>
    
      </div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing" dir="rtl">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>پلن‌های یوتاب پارس</h2>
          <p>پلن مناسب کسب‌وکار خود را انتخاب کنید</p>
        </div>
    
        <div class="row">
          @foreach($plans as $index => $plan)
          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
            <div class="box {{ $plan->is_featured ? 'featured' : '' }}">
              <h3>{{ $plan->title }}</h3>
              <h4>{{ $plan->price }}<span> تومان در ماه</span></h4>
              <ul>
                @foreach(json_decode($plan->features) as $feature)
                  <li> {{ $feature }}</li>
                @endforeach
              </ul>
              <a href="#" class="buy-btn">شروع کنید</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">
    
        <div class="section-title">
          <h2>سؤالات متداول</h2>
          <p>در این بخش به رایج‌ترین پرسش‌هایی که درباره خدمات دیجیتال مارکتینگ و طراحی سایت یوتاب پارس مطرح می‌شود، پاسخ داده‌ایم.</p>
        </div>
    
        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">
                طراحی سایت توسط یوتاب پارس شامل چه خدماتی است؟ 
                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  ما طراحی سایت را به‌صورت کامل انجام می‌دهیم؛ از طراحی رابط کاربری حرفه‌ای تا پیاده‌سازی فنی، بهینه‌سازی سئو، ریسپانسیو بودن و آموزش استفاده از سایت.
                </p>
              </div>
            </li>
    
            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">
                دیجیتال مارکتینگ یوتاب پارس شامل چه خدماتی می‌شود؟
                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  خدمات ما شامل مدیریت شبکه‌های اجتماعی، تبلیغات آنلاین، سئو، بازاریابی محتوایی، طراحی کمپین‌های تبلیغاتی و تحلیل داده‌ها برای رشد کسب‌وکار شماست.
                </p>
              </div>
            </li>
    
            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">
                چه زمانی نتایج دیجیتال مارکتینگ قابل مشاهده خواهد بود؟
                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  برخی نتایج مثل افزایش بازدید ممکن است در چند هفته اول قابل مشاهده باشد، اما نتایج پایدارتر معمولاً بین ۳ تا ۶ ماه زمان نیاز دارند.
                </p>
              </div>
            </li>
    
            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">
                آیا خدمات شما برای کسب‌وکارهای کوچک هم مناسب است؟
                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  بله، ما پکیج‌های متنوعی برای کسب‌وکارهای نوپا و کوچک طراحی کرده‌ایم تا با بودجه‌ی مناسب هم بتوانند وارد فضای دیجیتال شوند.
                </p>
              </div>
            </li>
    
            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">
                چگونه می‌توانم با تیم یوتاب پارس همکاری کنم؟
                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  فقط کافیست از طریق فرم تماس در سایت، واتساپ یا پیج اینستاگرام با ما ارتباط بگیرید. ما سریعاً با شما تماس می‌گیریم و فرآیند همکاری را شروع می‌کنیم.
                </p>
              </div>
            </li>
          </ul>
        </div>
    
      </div>
    </section>
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
    
        <div class="section-title">
          <h2>تماس با ما</h2>
          <p>برای مشاوره رایگان، دریافت خدمات طراحی سایت و دیجیتال مارکتینگ یا همکاری با یوتاب پارس، همین حالا با ما تماس بگیرید یا فرم زیر را پر کنید.</p>
        </div>
    
        <div class="row gy-4">
    
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info p-4 rounded shadow" style="background-color: #f9f9f9;">
              <div class="address mb-4">
                <i class="bi bi-geo-alt fs-4 text-primary"></i>
                <h4>آدرس:</h4>
                <p>شیراز، خیابان انوری، ساختمان مهستان</p>
              </div>
    
              <div class="email mb-4">
                <i class="bi bi-envelope fs-4 text-primary"></i>
                <h4>ایمیل:</h4>
                <p>info@utabpars.com</p>
              </div>
    
              <div class="phone mb-4">
                <i class="bi bi-phone fs-4 text-primary"></i>
                <h4>تلفن:</h4>
                <p>0917 000 1234</p>
              </div>
    
              <iframe style="border:0; width: 100%; height: 250px;" loading="lazy" allowfullscreen
                src="https://www.google.com/maps?q=شیراز%20انوری%20ساختمان%20مهستان&output=embed">
              </iframe>
            </div>
          </div>
    
          <div class="col-lg-7 d-flex align-items-stretch">
            <form action="{{ route('ContactToUs') }}" method="post" role="form" class="php-email-form p-4 rounded shadow bg-white w-100">
              @csrf
              <div class="row">
                <div class="form-group col-md-6 mb-3">
                  <label for="name">نام</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                  <label for="email">ایمیل</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="number">شماره تماس</label>
                <input type="text" class="form-control" name="number" id="number" required>
              </div>
              <div class="form-group mb-4">
                <label for="message">پیام</label>
                <textarea class="form-control" name="message" rows="6" required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2">ارسال پیام</button>
              </div>
            </form>
          </div>
    
        </div>
    
      </div>
    </section>
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 

@endsection
<?php
/**
 * Block Page Scroll template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.



?>

<style>
    /* @font-face {
  font-family: "Geist Sans";
  src: url("https://assets.codepen.io/605876/GeistVF.ttf") format("truetype");
} */

*,
*:after,
*:before {
	box-sizing: border-box;
}

html {
	scroll-snap-type: y mandatory;
}

body {
	min-height: 100vh;
	font-family:  "Geist Sans", "SF Pro Text", "SF Pro Icons", "AOS Icons", "Helvetica Neue", Helvetica, Arial, sans-serif, system-ui;
	font-weight: 500;
	background: #0f0122;
	color: hsl(0 0% 90%);
	overflow-x: hidden;
}

p {
	max-width: 40ch;
}

section:nth-of-type(1) {
	scroll-snap-align: center;
	height: 100vh;
}

section:nth-of-type(2) {
	scroll-snap-align: start;
}

article {
	min-height: 100vh;
}
:is(h1, h2) {
	font-weight: 600;
	font-size: clamp(2.5rem, 2.35vw + 1rem, 8rem);
	letter-spacing: -0.075ch;
	margin: 0;
}

h1 {
	color: hsl(0 0% 90%);
}

:is(section, article) {
	position: relative;
}

/* nav {
	position: fixed;
	top: 0;
	width: 100%;
	padding: 1rem;
	z-index: 999;
	display: flex;
	justify-content: space-between;
} */
/* a:first-of-type {
	width: 48px;
	aspect-ratio: 1;
	display: grid;
	place-items: center;
	color: white;
}
a:last-of-type {
	background: hsl(173 100% 51%);
	color: black;
	padding: 1rem 2rem;
	border-radius: 22px;
	text-decoration: none;
	font-weight: 120;
	transition: background 0.2s;
}
a:last-of-type:is(:hover, :focus-visible) {
	background: hsl(173 100% 40%);
} */

.content {
	margin: 0 auto;
	width: 900px;
	max-width: 100%;
	height: 100%;
	z-index: 2;
	position: absolute;
	inset: 0;
  padding: 1rem;
}

.fixed img {
	height: 100%;
	width: 110%;
	object-fit: cover;
	z-index: -1;
	position: absolute;
  object-position:top;
	inset: 0;
	left: 50%;
	translate: -50% 0;
	filter: brightness(0.3);
}

section:first-of-type img {
	left: 50%;
	translate: -50% 0;
}

section:first-of-type {
	padding: 2rem 1rem;
	display: grid;
	align-content: end;
	justify-content: start;
}

section:first-of-type .fixed {
	z-index: 5;
}

section:first-of-type .fixed .content {
	margin: 0 auto;
	width: 900px;
	max-width: 100%;
	display: grid;
	align-content: center;
	justify-content: start;
	padding: 6rem 2rem;
	height: 100%;
}

section:first-of-type {
	background: #0f0122;
}

section:first-of-type p {
	font-size: clamp(1rem, 0.2vw + 1rem, 2rem);
}

section:nth-of-type(2) article:first-of-type .fixed {
	z-index: 2;
}

section:nth-of-type(2) .content {
	display: grid;
	padding: 4rem 1rem;
	align-content: center;
}

section:nth-of-type(2) article:first-of-type .content {
	align-content: end;
}

section:nth-of-type(2) article:first-of-type .fixed::after {
	content: "";
	position: absolute;
	inset: 0;
	background: hsl(0 0% 0% / 0.25);
}

section:nth-of-type(2) article:first-of-type h2 {
	padding: 1rem 0;
}

section:nth-of-type(2) article:nth-of-type(2) .fixed {
	background: black;
	z-index: 2;
}

section:nth-of-type(2) article:nth-of-type(3) .content {
	align-content: start;
}

section:nth-of-type(2) article:nth-of-type(3) .fixed {
	z-index: 2;
}

section:nth-of-type(2) article:nth-of-type(3) img {
	filter: saturate(0.5) brightness(0.5);
}

.text-blocks {
	max-width: 100%;
	width: 40ch;
	justify-self: center;
	display: grid;
	place-items: center;
	gap: 2rem 0;
}

/* Text block styling */
.chat-container {
	height: 100vh;
	width: 100%;
	position: sticky;
	top: 0;
	display: grid;
	place-items: center;
}
.text-blocks p {
	display: inline-block;
	border-radius: 6px;
	margin: 0;
	font-size: 18px;
	font-weight: 500;
}
.text-blocks p:nth-of-type(even) {
	justify-self: end;
	text-align: right;
	color: #ff8154;
}
.text-blocks p:nth-of-type(odd) {
	justify-self: start;
}

.filler {
	display: none;
}


@supports (animation-timeline: scroll()) {
  @media(prefers-reduced-motion: no-preference) {
    article {
      view-timeline: --article;
    }

    .fixed {
      position: fixed;
      inset: 0;
    }
    .static {
      position: absolute;
      inset: 0;
      z-index: 6;
    }
    .filler {
      display: block;
      width: 100%;
      position: absolute;
      bottom: 30vh;
      padding: 1rem;
    }

    .text-blocks p {
      animation: slide-in, fade-in;
      animation-fill-mode: both;
      animation-timing-function: linear;
      animation-timeline: --article;
    }

    .text-blocks p:nth-of-type(1) { animation-range: entry-crossing 50% entry-crossing 55%; }
    .text-blocks p:nth-of-type(2) { animation-range: entry-crossing 55% entry-crossing 60%; }
    .text-blocks p:nth-of-type(3) { animation-range: entry-crossing 60% entry-crossing 65%; }
    .text-blocks p:nth-of-type(4) { animation-range: entry-crossing 65% entry-crossing 70%; }
    .text-blocks p:nth-of-type(5) { animation-range: entry-crossing 70% entry-crossing 75%; }

    section:nth-of-type(2) article:last-of-type {
      z-index: 5;
    }
    section:nth-of-type(2) article:nth-of-type(3) {
      height: 400vh;
    }
    section:nth-of-type(2) article:nth-of-type(3) h2 {
      margin-top: 80vh;
    }
    section:nth-of-type(2) article:last-of-type .fixed {
      clip-path: ellipse(220% 200% at 50% 300%);
      animation: unclip both linear;
      animation-timeline: --article;
      animation-range: entry 20% entry 80%;
    }
    .filler h2 {
      animation: fade-away, fade-out;
      animation-timing-function: linear;
      animation-fill-mode: both;
      animation-timeline: --article;
      animation-range: exit 40% exit 75%, exit 70% exit 90%;
    }
    .loud-wrap {
      clip-path: inset(0 0 0 0);
      animation: unmask both linear;
      animation-timeline: --article;
      animation-range: entry 20% entry 80%;
      mask: linear-gradient(white 50%, transparent) 0 100% / 100% 200% no-repeat;
    }
    .text-wrap {
      position: sticky;
      bottom: 4rem;
      transform-origin: 50% 0;
      animation: fade-away both linear, fade-out both linear;
      animation-timeline: --article;
      animation-range: exit 40% exit 75%, exit 70% exit 100%;
    }
    .text-blocks {
      animation: fade-out both linear;
      animation-timeline: --article;
      animation-range: entry-crossing 75% entry-crossing 100%;
    }
    section:nth-of-type(2) article:nth-of-type(3) .fixed {
      animation: fade-in both linear, fade-out both linear;
      animation-timeline: --article, --article;
      animation-range: entry 45% exit-crossing 0%, exit 0% exit 15%;
    }

    section:nth-of-type(2) article:nth-of-type(2) .fixed {
      animation: fade-in;
      animation-fill-mode: both;
      animation-timing-function: linear;
      animation-timeline: --article;
      animation-range: entry 60% exit 30%;
    }
    section:nth-of-type(2) article:nth-of-type(2) h2 {
      animation: slide-in, fade-in, fade-away, fade-out;
      animation-fill-mode: both;
      animation-timing-function: linear;
      animation-timeline: view(), view(), --article, --article;
      animation-range: entry 100% cover 25%, entry 100% cover 35%, exit 20% exit 40%, exit 40% exit 50%;
    }
    section:nth-of-type(2) article:first-of-type h2 {
      animation: slide-up both linear;
      animation-timeline: --article;
      animation-range: entry 20% entry 80%;
    }
    section:nth-of-type(2) article:first-of-type img {
      animation: scale-down both linear;
      animation-timeline: --article;
      animation-range: entry;
    }
    section:nth-of-type(2) article:first-of-type .fixed {
      clip-path: ellipse(220% 200% at 50% 300%);
      animation: unclip both linear;
      animation-timeline: --article;
      animation-range: entry 0 entry 100%;
    }
    section:first-of-type {
      view-timeline: --section;
    }
    section:first-of-type .fixed {
      animation: scale-and-move both linear, fade-out both linear;
      animation-timeline: --section;
      animation-range: exit 0% exit 50%, exit 0% exit 25%;
      transform-origin: 50% 0;
    }
    /* Keyframes collection	*/
    @keyframes slide-in {
      0% {
        translate: 0 100%;
      }
    }

    @keyframes fade-in {
      0% {
        opacity: 0;
      }
    }
    @keyframes slide-up {
      0% {
        translate: 0 100%;
      }
    }
    @keyframes fade-away {
      to {
        filter: blur(4rem);
      }
    }
    @keyframes unmask {
      to {
        mask-position: 0 0;
      }
    }
    @keyframes scale-down {
      0% {
        scale: 5;
      }
    }
    @keyframes unclip {
      to { clip-path: ellipse(220% 200% at 50% 175%); }
    }
    @keyframes fade-out {
      to { opacity: 0; }
    }
    @keyframes scale-and-move {
      to {
        translate: 0 -10%;
        scale: 0.35 0.5;
      }
    }
  }
}
</style>

<div class="block-page-scroll">

<?php if( have_rows('scroll_section_one') ): ?>
    <?php while( have_rows('scroll_section_one') ): the_row(); 

        // Get sub field values.
        $scroll_image_one = get_sub_field('image');
        $text = get_sub_field('text');

        ?>
     

          <section class="one">
    <div class="fixed">
      <img  class="" src="<?php echo esc_url( $scroll_image_one['url'] ); ?>" alt="<?php echo esc_attr( $scroll_image_one['alt'] ); ?>" />
      <div class="content" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="900">
       <?php echo $text ; ?>
      </div>
    </div>
  </section>
    <?php endwhile; ?>
<?php endif; ?>


  <section class="two">
    <?php if( have_rows('scroll_section_two') ): ?>
    <?php while( have_rows('scroll_section_two') ): the_row(); 

        // Get sub field values.
        $scroll_image_two = get_sub_field('image');
        $text = get_sub_field('text');

        ?>
    <article>
      <div class="fixed">
        <img  class="" src="<?php echo esc_url( $scroll_image_two['url'] ); ?>" alt="<?php echo esc_attr( $scroll_image_two['alt'] ); ?>" />
      </div>
      <div class="static">
        <div class="content">
          <div class="text-wrap">
            <div class="loud-wrap" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="900">
              <?php echo $text ; ?>
            </div>
          </div>
        </div>
      </div>
    </article>
      <?php endwhile; ?>
<?php endif; ?>
 <?php if( have_rows('scroll_section_three') ): ?>
    <?php while( have_rows('scroll_section_three') ): the_row(); 

        // Get sub field values.
        $scroll_image_three = get_sub_field('image');
        $text = get_sub_field('text');

        ?>
    <article>
      <div class="fixed">
         <img src="<?php echo esc_url( $scroll_image_three['url'] ); ?>" alt="<?php echo esc_attr( $scroll_image_three['alt'] ); ?>" />
      </div>
      <div class="static">
       <div class="content" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="900">
       <?php echo $text ; ?>
      </div>
      </div>
    </article>
     <?php endwhile; ?>
<?php endif; ?>
 <?php if( have_rows('scroll_section_four') ): ?>
    <?php while( have_rows('scroll_section_four') ): the_row(); 

        // Get sub field values.
        $scroll_image_four = get_sub_field('image');
        $text = get_sub_field('text');
         $title = get_sub_field('title');
          $title_two = get_sub_field('title_two');

        ?>
    <article>
      <div class="fixed">
        <img src="<?php echo esc_url( $scroll_image_four['url'] ); ?>" alt="<?php echo esc_attr( $scroll_image_four['alt'] ); ?>" />
      </div>
      <div class="static">
        <div class="content">
          <h2><?php echo $title ; ?></h2>
          <div class="chat-container">
            <div class="text-blocks" >
                  <?php echo $text ; ?>
            </div>
          </div>
          <div class="filler" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="900">
            <h2><?php echo $title_two ; ?></h2>
          </div>
        </div>
      </div>
    </article>
     <?php endwhile; ?>
<?php endif; ?>
 <?php if( have_rows('scroll_section_five') ): ?>
    <?php while( have_rows('scroll_section_five') ): the_row(); 

        // Get sub field values.
        $scroll_image_five = get_sub_field('image');
        $text = get_sub_field('text');
         $title = get_sub_field('title');
          $title_two = get_sub_field('title_two');

        ?>
    <article>
      <!-- <div class="fixed">
            <img src="https://fastly.picsum.photos/id/985/1920/1080.jpg?hmac=dLb_5lBJW4AZhZDUXweY5WlrnscpKLtCKffaqSrF9Vw" alt="">
          </div> -->
      <div class="fixed">
      <img class="" src="<?php echo esc_url( $scroll_image_five['url'] ); ?>" alt="<?php echo esc_attr( $scroll_image_five['alt'] ); ?>" />
        <div class="content">
         <?php echo $text ; ?>
        </div>
      </div>
      <!-- <div class="static">
            <div class="content">
              <h2>Fin.</h2>
            </div>
          </div> -->
    </article>
     <?php endwhile; ?>
<?php endif; ?>

  </section>




    <script type="module">


import gsap from "https://cdn.skypack.dev/gsap@3.12.2";
import { ScrollTrigger } from "https://cdn.skypack.dev/gsap@3.12.2/ScrollTrigger";

if (
  !CSS.supports("animation-timeline: view()") &&
  window.matchMedia("(prefers-reduced-motion: no-preference)").matches
) {
  gsap.registerPlugin(ScrollTrigger);
  // Set up all the scroll animations with ScrollTrigger instead.
  // Blanket styles
  gsap.set(".fixed", {
    position: "fixed",
    inset: 0
  });
  gsap.set(".static", {
    position: "absolute",
    inset: 0,
    zIndex: 6
  });
  // First section
  gsap.set("section:first-of-type .fixed", {
    transformOrigin: "50% 0%"
  });
  gsap.to("section:first-of-type .fixed", {
    scale: "0.35 0.5",
    yPercent: -10,
    scrollTrigger: {
      scrub: 0.5,
      trigger: "section:first-of-type",
      start: "top top",
      end: "bottom 50%"
    }
  });
  gsap.to("section:first-of-type .fixed", {
    opacity: 0,
    scrollTrigger: {
      scrub: 0.5,
      trigger: "section:first-of-type",
      start: "top top",
      end: "bottom 75%"
    }
  });
  // The second section with image scaling down, etc.
  gsap.set("section:nth-of-type(2) article:first-of-type .fixed", {
    clipPath: "ellipse(220% 200% at 50% 300%)",
    zIndex: 3
  });
  gsap.to("section:nth-of-type(2) article:first-of-type .fixed", {
    clipPath: "ellipse(220% 200% at 50% 175%)",
    scrollTrigger: {
      scrub: 0.5,
      trigger: "section:nth-of-type(2) article:first-of-type",
      start: "top bottom",
      end: "top top"
    }
  });
  gsap.from("section:nth-of-type(2) article:first-of-type img", {
    scale: 2,
    scrollTrigger: {
      scrub: 0.5,
      trigger: "section:nth-of-type(2) article:first-of-type",
      start: "top bottom",
      end: "top top",
    }
  });

  gsap.set(".loud-wrap", {
    clipPath: "inset(0 0 0 0)",
    mask: "linear-gradient(white 50%, transparent) 0 100% / 100% 200% no-repeat"
  });
  gsap.set(".text-wrap", {
    position: "sticky",
    bottom: "4rem",
    transformOrigin: "50% 0"
  });
  gsap.from("section:nth-of-type(2) article:first-of-type h2", {
    yPercent: 100,
    scrollTrigger: {
      scrub: 0.5,
      trigger: "section:nth-of-type(2) article:first-of-type",
      start: "top 50%",
      end: "top 0%"
    }
  });
  gsap.to("section:nth-of-type(2) article:first-of-type .loud-wrap", {
    maskPosition: "0 0",
    scrollTrigger: {
      scrub: 0.5,
      trigger: "section:nth-of-type(2) article:first-of-type",
      start: "top 50%",
      end: "top 0%"
    }
  });
  // Blur the text on exit
  gsap.to("section:nth-of-type(2) article:first-of-type .text-wrap", {
    filter: "blur(4rem)",
    opacity: 0,
    scrollTrigger: {
      scrub: 0.5,
      trigger: "section:nth-of-type(2) article:first-of-type",
      start: "bottom 60%",
      end: "bottom 25%"
    }
  });

  // Third section
  gsap.set("section:nth-of-type(2) article:nth-of-type(2) .fixed", {
    zIndex: 3
  });
  gsap.from("section:nth-of-type(2) article:nth-of-type(2) .fixed", {
    opacity: 0,
    scrollTrigger: {
      scrub: 0.5,
      trigger: "section:nth-of-type(2) article:nth-of-type(2)",
      start: "top 50%",
      end: "top -30%"
    }
  });
  gsap.from("section:nth-of-type(2) article:nth-of-type(2) h2", {
    yPercent: 100,
    opacity: 0,
    scrollTrigger: {
      scrub: 0.5,
      trigger: "section:nth-of-type(2) article:nth-of-type(2)",
      start: "top 50%",
      end: "top 25%"
    }
  });
  gsap.to("section:nth-of-type(2) article:nth-of-type(2) h2", {
    filter: "blur(4rem)",
    color: "transparent",
    scrollTrigger: {
      scrub: 0.5,
      trigger: "section:nth-of-type(2) article:nth-of-type(2)",
      start: "bottom bottom",
      end: "bottom 50%"
    }
  });
  // Fourth
  gsap.set(".filler", {
    display: "block",
    position: "absolute",
    bottom: "30vh",
    padding: "1rem"
  });
  gsap.set("section:nth-of-type(2) article:nth-of-type(3)", {
    height: "400vh"
  });
  gsap.set("section:nth-of-type(2) article:nth-of-type(3) .fixed", {
    zIndex: 3
  });
  gsap.set("section:nth-of-type(2) article:nth-of-type(3) h2", {
    marginTop: "80vh"
  });
  gsap.from("section:nth-of-type(2) article:nth-of-type(3) .fixed", {
    opacity: 0,
    scrollTrigger: {
      trigger: "section:nth-of-type(2) article:nth-of-type(3)",
      scrub: 0.5,
      start: "top 80%",
      end: "top top"
    }
  });
  gsap.to("section:nth-of-type(2) article:nth-of-type(3) img", {
    opacity: 0,
    scrollTrigger: {
      trigger: "section:nth-of-type(2) article:nth-of-type(3)",
      scrub: 0.5,
      start: "bottom bottom",
      end: "bottom 85%"
    }
  });
  // Animate the text blocks
  const LINES = document.querySelectorAll(".text-blocks p");
  LINES.forEach((LINE, index) => {
    gsap.from(LINE, {
      yPercent: 100,
      opacity: 0,
      scrollTrigger: {
        trigger: "section:nth-of-type(2) article:nth-of-type(3)",
        scrub: 0.5,
        start: `top -=${90 + index * 10}%`,
        end: `top -=${100 + index * 10}%`
      }
    });
  });
  gsap.to(".text-blocks", {
    opacity: 0,
    scrollTrigger: {
      trigger: "section:nth-of-type(2) article:nth-of-type(3)",
      scrub: 0.5,
      start: "bottom 130%",
      end: "bottom 110%"
    }
  });
  gsap.to(".filler h2", {
    opacity: 0,
    filter: "blur(4rem)",
    scrollTrigger: {
      trigger: "section:nth-of-type(2) article:nth-of-type(3)",
      scrub: 0.5,
      start: "bottom 55%",
      end: "bottom 30%"
    }
  });
  // The last piece is unclipping the end piece
  gsap.set("section:nth-of-type(2) article:last-of-type .fixed", {
    clipPath: "ellipse(220% 200% at 50% 300%)",
    zIndex: 5
  });
  gsap.to("section:nth-of-type(2) article:last-of-type .fixed", {
    clipPath: "ellipse(220% 200% at 50% 175%)",
    scrollTrigger: {
      trigger: "section:nth-of-type(2) article:last-of-type",
      scrub: 0.5,
      start: "top 80%",
      end: "top 20%"
    }
  });
}
</script>

</div>

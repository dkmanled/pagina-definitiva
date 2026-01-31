<?php
/**
 * DK Laserman Theme - Functions
 * * @package DK_Laserman
 * @version 2026.01
 * * ACTUALIZADO: Tracking optimizado para Stape + Meta CAPI + Redirección a Gracias
 */

if (!defined('ABSPATH')) exit;

/**
 * Theme Setup
 */
function dk_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    register_nav_menus(array(
        'primary' => __('Menú Principal', 'dk-laserman'),
    ));
}
add_action('after_setup_theme', 'dk_setup');

/**
 * Enqueue Scripts & Styles
 */
function dk_scripts() {
    // Google Fonts
    wp_enqueue_style('dk-fonts', 'https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&family=DM+Sans:wght@100..1000&display=swap', array(), null);
    
    // Tailwind CSS
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', array(), '3.4', false);
    
    // Theme styles
    wp_enqueue_style('dk-style', get_stylesheet_uri(), array(), '2026.01');
    
    // Tailwind config
    wp_add_inline_script('tailwindcss', "
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        display: ['Unbounded', 'sans-serif'],
                    },
                    colors: {
                        neon: '#00ff1d',
                        dark: '#090f0a',
                        surface: '#0c140d'
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow-pulse': 'glowPulse 2s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        glowPulse: {
                            '0%, 100%': { boxShadow: '0 0 20px rgba(0, 255, 29, 0.3)' },
                            '50%': { boxShadow: '0 0 40px rgba(0, 255, 29, 0.6)' },
                        }
                    }
                }
            }
        }
    ");
}
add_action('wp_enqueue_scripts', 'dk_scripts');

/**
 * Site Data Configuration
 */
function dk_get_site_data() {
    $uploads = 'https://laserman.com.ar/wp-content/uploads/2025';
    $uploads_old = 'https://laserman.com.ar/inicio/wp-content/uploads/2025/08';
    
    return array(
        // Contact
        'whatsapp' => '+5492995920418',
        'whatsapp_display' => '299 592 0418',
        'email' => 'info@laserman.com.ar',
        'phone' => '+54 9 299 592 0418',
        'location' => 'Neuquén, Patagonia Argentina',
        'instagram' => 'https://www.instagram.com/laseryshow/',
        
        // Images
        'hero_image' => 'https://laserman.com.ar/wp-content/uploads/2026/01/Video_Realista_Backstage_Subida_Escenario.mp4_snapshot_00.07.721.jpg',
        'tuneles_image' => $uploads . '/12/Imagen-de-WhatsApp-2025-05-12-a-las-20.07.43_2440bd38.jpg',
        'mapping_image' => $uploads . '/12/IMG-20251104-WA0002.jpg',
        'sponsors_image' => $uploads . '/12/IMG-20250809-WA00121.jpg',
        'custom_image' => $uploads . '/12/Generated-Image-October-29-2025-8_45AM-e1765355240381.png',
        
        // Videos
        'laserman_video' => 'https://youtube.com/shorts/UejPB4htjps',
        'tuneles_video' => 'https://youtube.com/shorts/ToSEWX40VYk',
        
        // Logos
        'logo_rionegro' => 'https://laserman.com.ar/wp-content/uploads/2026/01/LOGO-rio-negro.png',
        'logo_misiones' => 'https://laserman.com.ar/wp-content/uploads/2026/01/LOGO-misiones.png',
        'logo_formosa' => 'https://laserman.com.ar/wp-content/uploads/2026/01/LOGO-formosa.png',
        'logo_neuquen' => 'https://laserman.com.ar/wp-content/uploads/2026/01/LOGO-NEUQUEN2.png',
        
        // Brand logos
        'brand_logos' => array(
            $uploads_old . '/klipartz.com_.png',
            $uploads_old . '/sancor-2-scaled.png',
            $uploads_old . '/banco-patagonia.png',
            $uploads_old . '/bpn-nuestro.png',
            $uploads_old . '/logo-casinos-del-rio.png',
        ),
        
        // Stats
        'stats' => array(
            array('number' => '15+', 'label' => 'Años'),
            array('number' => '50+', 'label' => 'Fiestas Nacionales'),
            array('number' => '∞', 'label' => 'Momentos Únicos'),
        ),
        
        // Services
        'services' => array(
            array(
                'id' => 'laserman',
                'icon' => '⚡',
                'title' => 'Show Laserman',
                'description' => 'El único en Argentina - Performance futurista con rayos láser en vivo',
                'image' => 'https://laserman.com.ar/wp-content/uploads/2026/01/ChatGPT-Image-20-ene-2026-05_23_02-p.m.png',
            ),
            array(
                'id' => 'tuneles',
                'icon' => '🚪',
                'title' => 'Túneles de Ingreso',
                'description' => 'Transformá la entrada en una experiencia inmersiva de luz',
                'image' => $uploads . '/12/Imagen-de-WhatsApp-2025-05-12-a-las-20.07.43_2440bd38.jpg',
            ),
            array(
                'id' => 'mapping',
                'icon' => '🏔️',
                'title' => 'Mapping Láser',
                'description' => 'Proyecciones sobre edificios, monumentos y montañas',
                'image' => $uploads . '/12/IMG-20251104-WA0002.jpg',
            ),
            array(
                'id' => 'sponsors',
                'icon' => '💰',
                'title' => 'Sponsors & Marcas',
                'description' => 'Logos proyectados a escala monumental para patrocinadores',
                'image' => $uploads . '/12/IMG-20250809-WA00121.jpg',
            ),
            array(
                'id' => 'custom',
                'icon' => '🎨',
                'title' => 'Experiencia Custom',
                'description' => 'Co-creamos experiencias únicas según tu visión',
                'image' => '',
            ),
        ),
        
        // Festivals
        'festivals' => array(
            array('name' => 'Fiesta del Chocolate', 'location' => 'Bariloche, Río Negro'),
            array('name' => 'Fiesta del Pionero', 'location' => 'Centenario, Neuquén'),
            array('name' => 'Fiesta de la Navidad', 'location' => 'Leandro N. Alem, Misiones'),
            array('name' => 'Fiesta del Tomate', 'location' => 'Lamarque, Río Negro'),
            array('name' => 'Fiesta del Chef Patagónico', 'location' => 'Villa Pehuenia, Neuquén'),
            array('name' => 'Fiesta de la Actividad Física', 'location' => 'Cipolletti, Río Negro'),
        ),
        
        // Testimonials
        'testimonials' => array(
            array(
                'quote' => 'Rompimos los moldes de lo tradicional. Fue algo disruptivo que logró captar la atención, sobre todo de los jóvenes.',
                'name' => 'Julieta Corroza',
                'role' => 'Ministra de Desarrollo Humano, Neuquén',
            ),
            array(
                'quote' => 'Nunca se vio algo así. Es único, innovador. La gente filma, saca fotos. Las proyecciones se viralizan solas.',
                'name' => 'Juan Cruz',
                'role' => 'Jefe de Prensa, Fiesta del Pionero',
            ),
            array(
                'quote' => 'La profesionalidad y el impacto del show superaron nuestras expectativas. Fue el punto más comentado del evento.',
                'name' => 'Productora de Shows',
                'role' => 'Buenos Aires',
            ),
        ),
        
        // Segments
        'segments' => array(
            array(
                'id' => 'municipal',
                'icon' => '🏛️',
                'title' => 'Fiesta Nacional',
                'subtitle' => 'Municipal, Provincial',
                'quality' => 'hot',
                'enabled' => true,
            ),
            array(
                'id' => 'corporativo',
                'icon' => '🏢',
                'title' => 'Corporativo',
                'subtitle' => 'Empresas, Lanzamientos',
                'quality' => 'hot',
                'enabled' => true,
            ),
            array(
                'id' => 'festival',
                'icon' => '🎤',
                'title' => 'Festival',
                'subtitle' => 'Productores, Boliches',
                'quality' => 'hot',
                'enabled' => true,
            ),
            array(
                'id' => 'social',
                'icon' => '🎂',
                'title' => 'Evento Social',
                'subtitle' => '15 años, Casamientos',
                'quality' => 'excluded',
                'enabled' => false,
            ),
        ),
    );
}

/**
 * Footer Scripts - Tracking & Interactions
 * ACTUALIZADO: Optimizado para Stape + Meta CAPI + Redirect
 * Pixel ID: 899449552583355
 */
function laserman_tracking_2026() {
    ?>
    <script>
    // =============================================
    // FUNCIONES AUXILIARES
    // =============================================

    function getCookie(name) {
      var value = "; " + document.cookie;
      var parts = value.split("; " + name + "=");
      if (parts.length == 2) return parts.pop().split(";").shift();
      return '';
    }

    function generateEventId(eventName) {
      return 'laserman_' + eventName + '_' + Date.now() + '_' + Math.random().toString(36).substr(2,9);
    }

    // =============================================
    // 1. SEGMENT SELECTION - 3 Botones de público
    // =============================================

    function trackSegmentSelection(segment) {
      var eventId = generateEventId('SegmentSelection');
      
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        'event': 'SegmentSelection',
        'event_id': eventId,
        'segment': segment
      });
      
      console.log('SegmentSelection:', segment, eventId);
    }

    // =============================================
    // 2. WHATSAPP CLICK
    // =============================================

    function trackWhatsAppClick() {
      var eventId = generateEventId('Contact');
      
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        'event': 'WhatsAppClick',
        'event_id': eventId,
        'method': 'whatsapp'
      });
      
      console.log('WhatsAppClick:', eventId);
    }

    // =============================================
    // 3. LEAD - Formulario de contacto
    // =============================================

    function trackLead(formData) {
      var eventId = generateEventId('Lead');
      
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        'event': 'Lead',
        'event_id': eventId,
        'user_data': {
          'email': formData.email || '',
          'phone': formData.phone || '',
          'first_name': formData.name || '',
          'fbp': getCookie('_fbp'),
          'fbc': getCookie('_fbc')
        },
        'service': formData.service || ''
      });
      
      console.log('Lead:', eventId, formData);
    }

    // =============================================
    // LISTENERS AUTOMÁTICOS
    // =============================================

    document.addEventListener('DOMContentLoaded', function() {
      
      // ---- BOTONES DE SEGMENTO ----
      document.querySelectorAll('a[href*="#contacto"]').forEach(function(btn) {
        var text = btn.textContent.toLowerCase();
        
        if (text.includes('discoteca') || text.includes('boliche') || text.includes('noche')) {
          btn.addEventListener('click', function() {
            trackSegmentSelection('entretenimiento');
          });
        }
        
        if (text.includes('municipalidad') || text.includes('cultura')) {
          btn.addEventListener('click', function() {
            trackSegmentSelection('institucional');
          });
        }
        
        if (text.includes('productor') || text.includes('empresa') || text.includes('corporativo') || text.includes('privado')) {
          btn.addEventListener('click', function() {
            trackSegmentSelection('corporativo');
          });
        }
      });
      
      // ---- WHATSAPP ----
      document.querySelectorAll('a[href*="wa.me"], a[href*="whatsapp"]').forEach(function(link) {
        link.addEventListener('click', function() {
          trackWhatsAppClick();
        });
      });
      
      // ---- FORMULARIO (MODIFICADO PARA REDIRECT A GRACIAS) ----
      var forms = document.querySelectorAll('form');
      forms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
          
          // 1. Evitar que se envíe "a la antigua"
          e.preventDefault();
          
          // 2. Capturar datos y mandar al Pixel
          var formData = {
            name: form.querySelector('[name*="nombre"], [name*="name"]')?.value || '',
            email: form.querySelector('[name*="email"], [name*="mail"]')?.value || '',
            phone: form.querySelector('[name*="telefono"], [name*="phone"], [name*="whatsapp"], [name*="tel"]')?.value || '',
            service: form.querySelector('select, [name*="servicio"], [name*="service"]')?.value || ''
          };
          
          if (formData.email || formData.phone) {
            trackLead(formData);
          }

          // 3. Enviar el formulario y LLEVAR A LA PÁGINA DE GRACIAS
          // Usamos fetch para enviar los datos y luego hacemos el redirect
          var datos = new FormData(form);
          
          fetch(form.action, {
             method: form.method || 'POST',
             body: datos
          })
          .then(function() {
             // Si salió bien el envío, vamos a Gracias
             window.location.href = 'https://laserman.com.ar/gracias';
          })
          .catch(function() {
             // Si falló algo técnico, vamos a Gracias igual para no trabar al usuario
             window.location.href = 'https://laserman.com.ar/gracias';
          });
          
        });
      });
      
      // ---- Mobile Menu Toggle ----
      window.toggleMobileMenu = function() {
        var menu = document.getElementById('mobileMenu');
        if(menu) menu.classList.toggle('open');
      };
      
    });

    // Exponer funciones globalmente
    window.trackSegmentSelection = trackSegmentSelection;
    window.trackWhatsAppClick = trackWhatsAppClick;
    window.trackLead = trackLead;
    </script>
    <?php
}
add_action('wp_footer', 'laserman_tracking_2026');

/**
 * Get WhatsApp URL
 */
function dk_whatsapp_url($message = '') {
    $data = dk_get_site_data();
    $phone = preg_replace('/[^0-9]/', '', $data['whatsapp']);
    $url = 'https://wa.me/' . $phone;
    if ($message) {
        $url .= '?text=' . urlencode($message);
    }
    return $url;
}

/**
 * Body Classes
 */
function dk_body_classes($classes) {
    $classes[] = 'bg-dark';
    $classes[] = 'text-white';
    $classes[] = 'font-sans';
    return $classes;
}
add_filter('body_class', 'dk_body_classes');

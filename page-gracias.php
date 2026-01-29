<?php
/*
Template Name: Gracias
*/
get_header();
?>

<section class="min-h-screen flex flex-col justify-center items-center text-center px-4 md:px-6 relative overflow-hidden pt-24">
    <div class="absolute inset-0 bg-gradient-to-b from-dark via-zinc-900 to-dark"></div>
    
    <div class="relative z-10 max-w-2xl">
        <div class="mb-8 animate-bounce">
            <div class="text-8xl">✅</div>
        </div>
        
        <h1 class="text-4xl md:text-6xl font-display font-bold mb-6">
            ¡GRACIAS POR<br>
            <span class="text-neon neon-glow">TU CONSULTA!</span>
        </h1>
        
        <div class="h-[1px] w-32 bg-neon mx-auto mb-8 opacity-50"></div>
        
        <p class="text-xl text-zinc-300 mb-12">
            Te contactaremos en menos de 24hs para cotizar tu evento
        </p>
        
        <div class="space-y-4">
            <a href="https://wa.me/5492995920418?text=Hola%2C+quiero+cotizar+un+evento" 
               target="_blank"
               class="inline-block w-full max-w-md px-8 py-4 bg-neon text-black font-bold uppercase tracking-wide hover:bg-white transition-colors neon-box">
                💬 Escribinos por WhatsApp
            </a>
            
            <a href="https://www.laserman.com.ar" 
               class="inline-block w-full max-w-md px-8 py-4 border-2 border-neon/30 text-neon font-bold uppercase tracking-wide hover:border-neon hover:bg-neon/10 transition-all">
                🏠 Volver al inicio
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>

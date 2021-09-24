( function() {

    const swiperActu = new Swiper('.swiper-actualites', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        autoplay: {
            delay: 3000,
        },

        // If we need pagination
        pagination: {
            el: '.pagination-actualites',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.next-actualites',
            prevEl: '.prev-actualites',
        },


    })

    const swiperGalerie = new Swiper('.swiper-galerie', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        autoplay: {
            delay: 4000,
        },

        // If we need pagination
        pagination: {
            el: '.pagination-galerie',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.next-galerie',
            prevEl: '.prev-galerie',
        },

    })

}() );

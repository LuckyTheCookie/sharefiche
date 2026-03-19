// Wait for the DOM to be loaded
document.addEventListener("DOMContentLoaded", function() {

    gsap.registerPlugin(ScrollTrigger);

    // Animation pour le titre de la hero section
    gsap.from(".hero h1", {
        duration: 1,
        y: 50,
        opacity: 0,
        ease: "power3.out"
    });
    
    // Animation pour le paragraphe de la hero section
    gsap.from(".hero p", {
        duration: 1,
        y: 50,
        opacity: 0,
        ease: "power3.out",
        delay: 0.3
    });

    // Animation pour cta-button et bgbutton
    gsap.from(".cta-button", {
        duration: 1,
        y: 50,
        opacity: 0,
        ease: "power3.out",
        delay: 0.6
    });

    gsap.from(".bgbutton", {
        duration: 1,
        y: 50,
        opacity: 0,
        ease: "power3.out",
        delay: 0.6
    });

    
    // Animations pour les sections de contenu
    gsap.utils.toArray(".content-section").forEach(section => {
        gsap.from(section, {
            opacity: 0,
            y: 100,
            duration: 1,
            scrollTrigger: {
                trigger: section,
                start: "top 80%",
                end: "top 20%",
                toggleActions: "play none none reverse",
                scrub: 1
            }
        });
    });
    
    // Animation de disparition pour la section hero au défilement
    ScrollTrigger.create({
        trigger: ".hero",
        start: "top top",
        end: "bottom top",
        scrub: true,
        onUpdate: (self) => {
            gsap.to(".hero", {
                opacity: 1 - self.progress,
                y: self.progress * -50
            });
        }
    });

    // Animation pour les photos des membres
    gsap.from(".member", {
    opacity: 0,
    y: 50,
    stagger: 0.2,
    duration: 1,
    scrollTrigger: {
        trigger: ".team-members",
        start: "top 80%",
        end: "top 45%",
        toggleActions: "play none none reverse",
        scrub: 1
    }
});

    
});


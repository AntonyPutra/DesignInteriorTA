/**
 * Pratama Design Studio — Multilingual Translation Controller (ID <-> EN)
 * Seamlessly switches entire website text instantly with persistent preference.
 */
(() => {
  const translations = {
    id: {
      // Nav
      "nav.home": "Beranda",
      "nav.about": "Tentang",
      "nav.services": "Layanan",
      "nav.portfolio": "Portofolio",
      "nav.contact": "Kontak",
      "nav.consult": "Konsultasi",
      "nav.mode_label": "Mode Tampilan",
      "nav.lang_label": "Pilihan Bahasa",

      // Hero
      "hero.eyebrow": "PT Pratama Berkah Utama",
      "hero.title_sub": "Design Studio",
      "hero.desc": "Mewujudkan ruang yang harmonis — menyatukan estetika yang indah dengan fungsi yang nyaman untuk kehidupan sehari-hari.",
      "hero.footer_profile": "Profil Perusahaan",
      "hero.footer_est": "Berdiri 2021",

      // About
      "about.title": "Tentang Kami",
      "about.lead": "Pratama Design Studio & Build adalah studio desain interior dan eksterior yang berfokus pada konsultasi, perencanaan, produksi, fit-out, hingga renovasi.",
      "about.desc": "Kami hadir untuk menciptakan ruang yang mendukung kebutuhan dan gaya hidup pengguna — memadukan karakter visual yang kuat dengan fungsi yang praktis. Berbasis di Jakarta, tim kami menangani proyek residensial, ritel, F&B, dan perkantoran, didukung oleh workshop dan fasilitas produksi milik sendiri.",
      "about.v1": "Profesionalisme",
      "about.v2": "Integritas",
      "about.v3": "Inovasi",
      "about.v4": "Perhatian pada Detail",
      "about.caption": "Pratamaid / Desain dan bangun interior & eksterior",

      // About Rich Content (Profil, Visi Misi, Keunggulan, Principal)
      "about.profile_tag": "PROFIL PERUSAHAAN",
      "about.profile_title": "PT Pratama Berkah Utama",
      "about.p1": "Pratama Design Studio adalah brand dari PT Pratama Berkah Utama, perusahaan yang bergerak di bidang interior & exterior design & build. Berdiri sejak tahun 2021 dan berkantor di Jakarta, Indonesia.",
      "about.p2": "Kami menyediakan layanan lengkap mulai dari konsultasi fit-out, perencanaan proyek, manajemen anggaran, visualisasi 3D digital, proses produksi custom interior, hingga pelaksanaan fit-out dan renovasi secara end-to-end.",
      "about.p3": "Dengan pengalaman menangani berbagai jenis proyek — landed house, apartment, F&B, booth, dan office — kami hadir sebagai mitra terpercaya untuk mewujudkan ruang impian Anda dengan standar kualitas tinggi.",
      "about.badge_sub": "INTERIOR · EXTERIOR · DESIGN & BUILD",
      "about.stat_projects": "Proyek Selesai",
      "about.stat_years": "Tahun Pengalaman",
      "about.stat_cities": "Kota Jangkauan",
      "about.fact_est": "Berdiri",
      "about.fact_loc": "Lokasi",
      "about.fact_loc_val": "Jakarta, Indonesia",
      "about.fact_port": "Portfolio",
      "about.fact_port_val": "20+ Proyek",
      "about.fact_cov": "Jangkauan",
      "about.fact_cov_val": "Multi-Kota",

      // Vision & Mission
      "about.vision_tag": "ARAH PERUSAHAAN",
      "about.vision_title": "Visi & Misi",
      "about.vis_title": "Visi",
      "about.vis_desc": "Menjadi perusahaan desain interior terpercaya yang tidak hanya mengutamakan estetika, tetapi juga fungsionalitas ruang bagi pemiliknya — menghadirkan karya yang bertahan lama, bermakna, dan mencerminkan kepribadian penghuninya.",
      "about.mis_title": "Misi",
      "about.mis_desc": "Memahami kebutuhan klien secara mendalam dan menerjemahkannya menjadi desain yang menarik, praktis, fungsional, dan sesuai dengan anggaran yang tersedia — dengan komunikasi yang transparan sepanjang proses.",

      // Advantages
      "about.adv_tag": "MENGAPA KAMI",
      "about.adv_title": "Keunggulan Pratama Design Studio",
      "about.adv_desc": "Kami hadir sebagai mitra terpercaya yang memberikan layanan desain interior komprehensif dengan standar kualitas tinggi dan nilai yang transparan.",
      "about.adv_btn": "Mulai Konsultasi",
      "about.adv1_title": "One-Stop Solution",
      "about.adv1_desc": "Dari konsultasi hingga fit-out selesai, semua ditangani oleh satu tim.",
      "about.adv2_title": "Free Pre-Layout & Konsultasi",
      "about.adv2_desc": "Klien mendapat konsep denah awal dan konsultasi fit-out gratis sebelum agreement.",
      "about.adv3_title": "Fleksibel dalam Budget",
      "about.adv3_desc": "Kami menyesuaikan desain dan material dengan anggaran yang dimiliki klien.",
      "about.adv4_title": "Workshop & Fasilitas Produksi Sendiri",
      "about.adv4_desc": "Produksi furniture dan elemen interior custom dilakukan di workshop kami sendiri.",
      "about.adv5_title": "Pengalaman Multi-Segmen",
      "about.adv5_desc": "Berpengalaman menangani residential, F&B, retail, dan office project.",
      "about.adv6_title": "Mampu Multi-Kota",
      "about.adv6_desc": "Kami dapat menangani proyek di berbagai kota di Indonesia.",

      // Principal Card
      "about.principal_tag": "FOUNDER & CEO",
      "about.principal_name": "Kaleb Wahyu Pratama",
      "about.principal_desc": "Sebagai Founder dan CEO Pratama Design Studio, Kaleb memimpin setiap proyek dengan visi desain yang kuat dan komitmen terhadap kualitas. Beliau berpengalaman dalam menangani proyek interior & exterior residential, F&B, dan commercial di berbagai kota Indonesia.",
      "about.tag_interior": "Interior Design",
      "about.tag_pm": "Project Management",
      "about.tag_db": "Design & Build",

      // About Standalone Page Extras
      "about.hero_story": "KISAH KAMI",
      "about.hero_title": "Tentang Kami",
      "about.hero_subtitle": "Kami adalah perusahaan desain interior & exterior yang berpusat di Jakarta, berkomitmen menghadirkan ruang yang estetis dan fungsional bagi setiap klien.",
      "about.cta_title": "Tertarik Bekerja Sama?",
      "about.cta_desc": "Konsultasikan kebutuhan desain Anda bersama kami. Gratis dan tanpa kewajiban.",
      "about.cta_btn": "Konsultasi Sekarang",

      // Services
      "services.title": "Layanan Kami",
      "services.subtitle": "Dukungan proyek menyeluruh, dari diskusi awal di lokasi hingga instalasi dan sentuhan akhir.",
      "services.s1_title": "Konsultasi Fit-Out",
      "services.s1_desc": "Perencanaan ruang berdasarkan kebutuhan pengguna, anggaran, dan pengukuran lokasi sebelum eksekusi.",
      "services.s2_title": "Rencana & Jadwal Proyek",
      "services.s2_desc": "Konsep desain, spesifikasi, dan perencanaan teknis yang disusun dalam jalur eksekusi yang jelas dan terstruktur.",
      "services.s3_title": "Anggaran Proyek",
      "services.s3_desc": "Pengendalian biaya yang bertujuan menghadirkan kualitas terbaik dalam anggaran proyek yang telah disepakati.",
      "services.s4_title": "Render Digital 3D",
      "services.s4_desc": "Visualisasi 3D untuk menyamakan ekspektasi desain sebelum proses konstruksi dan produksi dimulai.",
      "services.s5_title": "Produksi",
      "services.s5_desc": "Elemen interior custom diproduksi melalui workshop mandiri dan diselaraskan dengan spesifikasi proyek.",
      "services.s6_title": "Fit-Out & Renovasi",
      "services.s6_desc": "Eksekusi lapangan yang mengubah desain yang telah disetujui menjadi ruang yang fungsional dan terselesaikan.",

      // Statement
      "statement.text": "<span>Mengubah Ide</span> menjadi Ruang yang Hidup",

      // Portfolio
      "portfolio.eyebrow": "Portofolio Proyek",
      "portfolio.title": "Karya Kami",
      "portfolio.btn_all": "Lihat Semua Proyek",
      "portfolio.overlay": "Selengkapnya",

      // Process
      "process.eyebrow": "Alur Kerja Kami",
      "process.title": "Cara Kerja Kami",
      "process.subtitle": "Tahapan terstruktur, transparan, dan terarah dari awal konsultasi hingga instalasi interior berkualitas tinggi.",
      "process.step1_tag": "Tahap 01",
      "process.step1_title": "Konsultasi Awal",
      "process.step1_desc": "Diskusi mendalam mengenai kebutuhan ruang, preferensi gaya, pengukuran lokasi langsung, dan estimasi rencana anggaran secara transparan.",
      "process.step2_tag": "Tahap 02",
      "process.step2_title": "Perencanaan & Konsep",
      "process.step2_desc": "Penyusunan denah tata letak (layout), kurasi material & palet warna (moodboard), serta penjadwalan pengerjaan proyek yang jelas.",
      "process.step3_tag": "Tahap 03",
      "process.step3_title": "Visualisasi 3D",
      "process.step3_desc": "Penyajian render 3D fotorealistis dan gambar teknis kerja (shop drawing) agar Anda melihat hasil nyata sebelum tahap produksi dimulai.",
      "process.step4_tag": "Tahap 04",
      "process.step4_title": "Produksi & Fit-Out",
      "process.step4_desc": "Fabrikasi furniture custom di workshop mandiri dengan material pilihan, serta instalasi on-site presisi hingga ruang siap dihuni.",
      "process.philosophy_eyebrow": "Filosofi Desain",
      "process.philosophy_quote": "“Setiap sudut ruang memiliki cerita. Kami merancang harmoni antara keindahan estetika dan kenyamanan fungsi hunian.”",

      // Testimonials
      "testi.eyebrow": "Kata Klien Kami",
      "testi.title": "Kepercayaan Mereka,<br>Kebanggaan Kami",
      "testi.q1": "\"Kami sangat puas dengan hasil desain ruang tamu kami. Tim Pratama benar-benar memahami keinginan kami dan menghadirkan ruang yang elegan, nyaman, dan fungsional sesuai budget yang disepakati.\"",
      "testi.q2": "\"Prosesnya sangat terstruktur dari awal hingga akhir. Visualisasi 3D yang diberikan sangat membantu kami membayangkan hasilnya sebelum konstruksi dimulai. Hasilnya melebihi ekspektasi!\"",
      "testi.q3": "\"Komunikasi tim sangat baik dan responsif. Mereka selalu memberikan laporan perkembangan pekerjaan setiap harinya. Sangat puas dengan hasilnya!\"",
      "testi.q4": "\"Pratama Design Studio mengubah ruang kantor kami menjadi tempat yang produktif dan representatif. Desainnya modern dan profesional, sangat sesuai dengan identitas perusahaan kami.\"",
      "testi.q5": "\"Saya rekomendasikan Pratama untuk siapa saja yang mencari interior premium dengan harga yang masuk akal. Material yang digunakan berkualitas tinggi dan finishing-nya sangat rapi.\"",
      "testi.q6": "\"Workshop mandiri mereka adalah nilai tambah yang besar! Furnitur custom yang diproduksi sangat presisi dan sesuai gambar teknis. Tidak ada celah antara desain dan hasil akhirnya.\"",
      "testi.q7": "\"Stand pameran kami di ICE BSD mendapat perhatian luar biasa berkat desain Pratama yang menonjol dan fungsional. Mereka sangat profesional dalam mengelola proyek dengan tenggat waktu yang ketat.\"",
      "testi.q8": "\"Detail perhatian mereka luar biasa. Setiap sudut ruangan diperhatikan dengan baik. Dari pemilihan warna hingga pencahayaan, semuanya kohesif dan menciptakan suasana yang hangat.\"",
      "testi.q9": "\"Mulai dari konsultasi hingga serah terima kunci, semuanya berjalan lancar. Tim yang ramah, berpengalaman, dan sangat mendengarkan keinginan klien. Akan menggunakan jasa mereka lagi!\"",

      // CTA Consultation
      "cta.title": "Siap Mewujudkan Ruang Impian Anda?",
      "cta.desc": "Konsultasikan kebutuhan desain interior Anda bersama tim kami.<br>Gratis pre-layout concept dan estimasi awal.",
      "cta.btn_wa": "CHAT VIA WHATSAPP",
      "cta.btn_form": "ISI FORM KONSULTASI",

      // Principal (Kept for fallback)
      "principal.title": "Kenali Principal Kami",
      "principal.role": "Pendiri & CEO",
      "principal.bio": "Pratamaid berdiri pada akhir tahun 2021 dan terus berkembang melalui proyek residensial, ritel, dan perkantoran. Komitmen studio adalah menghadirkan ruang yang memiliki nilai estetika tinggi sekaligus sangat fungsional.",
      "principal.caption": "Tim studio Pratamaid",

      // Modal
      "modal.kicker": "KONSULTASI DESAIN",
      "modal.title": "Mulai Proyek Anda",
      "modal.desc": "Diskusikan kebutuhan interior atau eksterior Anda dengan tim desainer dan kontraktor Pratama.",
      "modal.name": "Nama Lengkap",
      "modal.name_placeholder": "Nama Anda",
      "modal.email": "Email",
      "modal.email_placeholder": "nama@email.com",
      "modal.phone": "Nomor WhatsApp / HP",
      "modal.phone_placeholder": "+62 8...",
      "modal.service": "Jenis Layanan",
      "modal.opt_res": "Interior Rumah Tinggal (Landed House)",
      "modal.opt_apt": "Interior Apartemen",
      "modal.opt_com": "Komersial / F&B / Cafe / Resto",
      "modal.opt_off": "Kantor / Office & Reception",
      "modal.opt_bth": "Booth Pameran",
      "modal.opt_cns": "Konsultasi & Estimasi Biaya",
      "modal.msg": "Detail Proyek / Pesan",
      "modal.msg_placeholder": "Ceritakan ukuran lokasi, konsep yang diinginkan, atau estimasi jadwal...",
      "modal.submit": "Kirim Pesan Konsultasi",
      "modal.success": "Terima kasih! Pesan Anda telah terkirim. Tim Pratama akan segera menghubungi Anda.",

      // Footer
      "footer.desc": "Pratama Design Studio & Build spesialis konsultasi interior dan eksterior, desain arsitektur, perencanaan tata ruang, produksi custom workshop, dan renovasi di Jakarta.",
      "footer.menu_title": "Menu Utama",
      "footer.contact_title": "Hubungi Kami",
      "footer.location_title": "Lokasi Kami",
      "footer.hours": "Jam Kerja: Senin – Sabtu 08:30 – 17:30",
      "footer.map_badge": "Buka di Maps",
      "footer.copyright": "© 2026 PT Pratama Berkah Utama. Seluruh hak cipta dilindungi.",
      "footer.tagline": "Desain & Bangun Interior dan Eksterior · Jakarta",
      "footer.nav_home": "Beranda",
      "footer.nav_about": "Tentang Kami",
      "footer.nav_services": "Layanan",
      "footer.nav_portfolio": "Portofolio",
      "footer.nav_process": "Cara Kerja Kami",
      "footer.nav_testimonials": "Kata Klien Kami",
      "footer.nav_principal": "Konsultasi Desain",
      "footer.nav_consult": "Form Konsultasi"
    },
    en: {
      // Nav
      "nav.home": "Home",
      "nav.about": "About",
      "nav.services": "Services",
      "nav.portfolio": "Portfolio",
      "nav.contact": "Contact",
      "nav.consult": "Consultation",
      "nav.mode_label": "Display Mode",
      "nav.lang_label": "Language",

      // Hero
      "hero.eyebrow": "PT Pratama Berkah Utama",
      "hero.title_sub": "Design Studio",
      "hero.desc": "Elevating spaces through harmonious blend of function and aesthetic interior design.",
      "hero.footer_profile": "Company Profile",
      "hero.footer_est": "Est. 2021",

      // About
      "about.title": "About Us",
      "about.lead": "Pratama Design Studio & Build specializes in interior and exterior consultancy, design, production, fit-out, and renovation.",
      "about.desc": "The studio focuses on creating spaces that support user needs and lifestyle, combining visual character with practical function. Based in Jakarta, our team handles residential, retail, F&B, and office projects, supported by our own workshop and production facilities.",
      "about.v1": "Professionalism",
      "about.v2": "Integrity",
      "about.v3": "Innovation",
      "about.v4": "Attention to Detail",
      "about.caption": "Pratamaid / Interior & exterior design and build",

      // About Rich Content (Profil, Visi Misi, Keunggulan, Principal)
      "about.profile_tag": "COMPANY PROFILE",
      "about.profile_title": "PT Pratama Berkah Utama",
      "about.p1": "Pratama Design Studio is a brand of PT Pratama Berkah Utama, an interior & exterior design & build company established in 2021 and headquartered in Jakarta, Indonesia.",
      "about.p2": "We provide comprehensive end-to-end services from fit-out consultation, project planning, budget management, digital 3D visualization, custom interior production, to final execution and renovation.",
      "about.p3": "With experience delivering diverse projects — landed houses, apartments, F&B, exhibition booths, and offices — we stand as your trusted partner to bring your dream spaces to life with premium quality standards.",
      "about.badge_sub": "INTERIOR · EXTERIOR · DESIGN & BUILD",
      "about.stat_projects": "Projects Completed",
      "about.stat_years": "Years Experience",
      "about.stat_cities": "Cities Covered",
      "about.fact_est": "Established",
      "about.fact_loc": "Location",
      "about.fact_loc_val": "Jakarta, Indonesia",
      "about.fact_port": "Portfolio",
      "about.fact_port_val": "20+ Projects",
      "about.fact_cov": "Coverage",
      "about.fact_cov_val": "Multi-City",

      // Vision & Mission
      "about.vision_tag": "COMPANY DIRECTION",
      "about.vision_title": "Vision & Mission",
      "about.vis_title": "Vision",
      "about.vis_desc": "To be a trusted interior design studio that prioritizes not only visual aesthetics, but also true spatial functionality for its owners — crafting enduring, meaningful spaces that reflect the distinct personality of their occupants.",
      "about.mis_title": "Mission",
      "about.mis_desc": "To deeply understand client needs and translate them into attractive, practical, and functional designs aligned with available budgets — supported by transparent communication throughout every step.",

      // Advantages
      "about.adv_tag": "WHY CHOOSE US",
      "about.adv_title": "Why Pratama Design Studio",
      "about.adv_desc": "We serve as a reliable partner delivering comprehensive interior design services with uncompromising quality standards and transparent value.",
      "about.adv_btn": "Start Consultation",
      "about.adv1_title": "One-Stop Solution",
      "about.adv1_desc": "From initial consultation to final fit-out handover, everything is executed seamlessly by a single in-house team.",
      "about.adv2_title": "Free Pre-Layout & Consultation",
      "about.adv2_desc": "Clients receive an initial space layout concept and fit-out consultation free of charge before signing any agreement.",
      "about.adv3_title": "Budget Flexibility",
      "about.adv3_desc": "We tailor our design concepts and material curation to match our clients' allocated budget parameters.",
      "about.adv4_title": "Dedicated In-House Workshop",
      "about.adv4_desc": "Custom furniture fabrication and bespoke interior components are handcrafted in our own dedicated workshop facility.",
      "about.adv5_title": "Multi-Sector Experience",
      "about.adv5_desc": "Proven expertise managing residential, F&B, commercial retail, and office environments.",
      "about.adv6_title": "Multi-City Delivery",
      "about.adv6_desc": "Fully equipped to execute projects across multiple metropolitan regions throughout Indonesia.",

      // Principal Card
      "about.principal_tag": "FOUNDER & CEO",
      "about.principal_name": "Kaleb Wahyu Pratama",
      "about.principal_desc": "As Founder and CEO of Pratama Design Studio, Kaleb leads every project with a bold design vision and unwavering dedication to quality craftsmanship. He brings extensive experience executing residential, F&B, and commercial projects across Indonesian cities.",
      "about.tag_interior": "Interior Design",
      "about.tag_pm": "Project Management",
      "about.tag_db": "Design & Build",

      // About Standalone Page Extras
      "about.hero_story": "OUR STORY",
      "about.hero_title": "About Us",
      "about.hero_subtitle": "We are an interior & exterior design and build studio based in Jakarta, committed to creating aesthetic and functional spaces for every client.",
      "about.cta_title": "Interested in Working Together?",
      "about.cta_desc": "Consult your interior design needs with our expert team. Free and no obligation.",
      "about.cta_btn": "Consult Now",

      // Services
      "services.title": "What We Do",
      "services.subtitle": "One-stop project support, from first site conversation to installation and final touches.",
      "services.s1_title": "Fit-Out Consultation",
      "services.s1_desc": "Planning spaces around user needs, budget, and site measurements before execution.",
      "services.s2_title": "Project Plan & Schedule",
      "services.s2_desc": "Design concept, specifications, and technical planning organized into a clear execution path.",
      "services.s3_title": "Project Budgeting",
      "services.s3_desc": "Cost control aimed at achieving the best possible quality within the agreed project budget.",
      "services.s4_title": "Digital Rendering",
      "services.s4_desc": "3D visualization to align design expectations before construction and production begin.",
      "services.s5_title": "Production",
      "services.s5_desc": "Custom interior elements produced through our workshop and coordinated with project specifications.",
      "services.s6_title": "Fit-Out & Renovation",
      "services.s6_desc": "On-site execution that transforms approved designs into functional, finished environments.",

      // Statement
      "statement.text": "<span>Transforming Ideas</span> into Living Spaces",

      // Portfolio
      "portfolio.eyebrow": "Project Portfolio",
      "portfolio.title": "Selected Works",
      "portfolio.btn_all": "View All Projects",
      "portfolio.overlay": "View Detail",

      // Process
      "process.eyebrow": "How We Work",
      "process.title": "Our Work Process",
      "process.subtitle": "Structured, transparent, and guided stages from initial consultation to premium interior installation.",
      "process.step1_tag": "Step 01",
      "process.step1_title": "Initial Consultation",
      "process.step1_desc": "In-depth discussion on spatial needs, style preferences, direct site measurements, and transparent budget estimation.",
      "process.step2_tag": "Step 02",
      "process.step2_title": "Planning & Concept",
      "process.step2_desc": "Layout planning, material and color palette curation (moodboard), and structured project scheduling.",
      "process.step3_tag": "Step 03",
      "process.step3_title": "3D Visualization",
      "process.step3_desc": "Photorealistic 3D renders and detailed technical drawings so you can visualize the result before production starts.",
      "process.step4_tag": "Step 04",
      "process.step4_title": "Production & Fit-Out",
      "process.step4_desc": "Custom furniture fabrication in our dedicated workshop with selected materials, and precise on-site installation.",
      "process.philosophy_eyebrow": "Design Philosophy",
      "process.philosophy_quote": "“Every corner of a space has a story. We craft harmony between aesthetic beauty and the comfort of living function.”",

      // Testimonials
      "testi.eyebrow": "Client Testimonials",
      "testi.title": "Their Trust,<br>Our Pride",
      "testi.q1": "\"We are extremely satisfied with our living room design. The Pratama team truly understood our wishes and delivered an elegant, comfortable, and functional space within the agreed budget.\"",
      "testi.q2": "\"The process was very well-structured from start to finish. The 3D visualization provided helped us clearly imagine the result before construction began. The outcome exceeded expectations!\"",
      "testi.q3": "\"The team's communication was excellent and responsive. They provided daily updates on the work progress. Very happy with the final result!\"",
      "testi.q4": "\"Pratama Design Studio transformed our office into a productive and prestigious workplace. The design is modern and professional, perfectly matching our corporate identity.\"",
      "testi.q5": "\"I highly recommend Pratama to anyone seeking premium interior quality at a reasonable price. The materials used are top-grade and the finishing is immaculate.\"",
      "testi.q6": "\"Their dedicated workshop is a huge advantage! Custom furniture was fabricated with great precision according to technical drawings. Zero gap between design and execution.\"",
      "testi.q7": "\"Our exhibition booth at ICE BSD received extraordinary attention thanks to Pratama's standout and functional design. Highly professional with tight project deadlines.\"",
      "testi.q8": "\"Their attention to detail is outstanding. Every corner of the room was thoughtfully addressed. From color palettes to lighting, everything is cohesive and warm.\"",
      "testi.q9": "\"From the first consultation to key handover, everything went smoothly. A friendly, experienced team that truly listens to client desires. Will definitely work with them again!\"",

      // CTA Consultation
      "cta.title": "Ready to Bring Your Dream Space to Life?",
      "cta.desc": "Consult your interior design needs with our team.<br>Free pre-layout concept and initial estimate.",
      "cta.btn_wa": "CHAT VIA WHATSAPP",
      "cta.btn_form": "FILL CONSULTATION FORM",

      // Principal (Kept for fallback)
      "principal.title": "Meet Our Principal",
      "principal.role": "Founder & CEO",
      "principal.bio": "Pratamaid was established at the end of 2021 and has grown across residential, retail, and office work. The studio's commitment is to deliver spaces that are visually considered and highly functional.",
      "principal.caption": "Pratamaid studio team",

      // Modal
      "modal.kicker": "DESIGN CONSULTATION",
      "modal.title": "Start Your Project",
      "modal.desc": "Discuss your interior or exterior project with Pratama's design and build team.",
      "modal.name": "Full Name",
      "modal.name_placeholder": "Your Name",
      "modal.email": "Email Address",
      "modal.email_placeholder": "name@email.com",
      "modal.phone": "WhatsApp / Phone Number",
      "modal.phone_placeholder": "+62 8...",
      "modal.service": "Service Type",
      "modal.opt_res": "Residential Interior (Landed House)",
      "modal.opt_apt": "Apartment Interior",
      "modal.opt_com": "Commercial / F&B / Cafe / Resto",
      "modal.opt_off": "Office & Reception Interior",
      "modal.opt_bth": "Exhibition Booth",
      "modal.opt_cns": "Consultation & Estimation",
      "modal.msg": "Project Details / Message",
      "modal.msg_placeholder": "Tell us about your space size, preferred style, or timeline...",
      "modal.submit": "Send Consultation Request",
      "modal.success": "Thank you! Your message has been sent. The Pratama team will contact you shortly.",

      // Footer
      "footer.desc": "Pratama Design Studio & Build specializes in interior and exterior consultancy, architectural design, space planning, custom workshop production, and renovation in Jakarta.",
      "footer.menu_title": "Main Menu",
      "footer.contact_title": "Contact Us",
      "footer.location_title": "Our Location",
      "footer.hours": "Working Hours: Monday – Saturday 08:30 – 17:30",
      "footer.map_badge": "Open in Maps",
      "footer.copyright": "© 2026 PT Pratama Berkah Utama. All rights reserved.",
      "footer.tagline": "Interior & Exterior Design and Build · Jakarta",
      "footer.nav_home": "Home",
      "footer.nav_about": "About Us",
      "footer.nav_services": "Services",
      "footer.nav_portfolio": "Portfolio",
      "footer.nav_process": "How We Work",
      "footer.nav_testimonials": "Client Testimonials",
      "footer.nav_principal": "Design Consultation",
      "footer.nav_consult": "Consultation Form"
    }
  };

  window.PRATAMA_TRANSLATIONS = translations;

  /**
   * Apply language to all elements with data-i18n attributes
   */
  window.setLanguage = function(lang, persist) {
    if (persist === undefined) persist = true;
    var activeLang = (lang === 'en') ? 'en' : 'id';
    var dict = translations[activeLang];
    if (!dict) return;

    // Set attributes on root & body
    document.documentElement.setAttribute('data-lang', activeLang);
    document.documentElement.setAttribute('lang', activeLang);
    if (document.body) {
      document.body.setAttribute('data-lang', activeLang);
    }

    // Persist choice
    if (persist) {
      try {
        localStorage.setItem('pratama_lang', activeLang);
      } catch (e) {}
    }

    // Update text content / innerHTML
    var i18nEls = document.querySelectorAll('[data-i18n]');
    for (var i = 0; i < i18nEls.length; i++) {
      var key = i18nEls[i].getAttribute('data-i18n');
      if (dict[key] !== undefined) {
        i18nEls[i].innerHTML = dict[key];
      }
    }

    // Update input placeholders
    var phEls = document.querySelectorAll('[data-i18n-placeholder]');
    for (var j = 0; j < phEls.length; j++) {
      var phKey = phEls[j].getAttribute('data-i18n-placeholder');
      if (dict[phKey] !== undefined) {
        phEls[j].setAttribute('placeholder', dict[phKey]);
      }
    }

    // Update aria-label
    var ariaEls = document.querySelectorAll('[data-i18n-aria-label]');
    for (var k = 0; k < ariaEls.length; k++) {
      var ariaKey = ariaEls[k].getAttribute('data-i18n-aria-label');
      if (dict[ariaKey] !== undefined) {
        ariaEls[k].setAttribute('aria-label', dict[ariaKey]);
      }
    }

    // Update title attribute
    var titleEls = document.querySelectorAll('[data-i18n-title]');
    for (var t = 0; t < titleEls.length; t++) {
      var titleKey = titleEls[t].getAttribute('data-i18n-title');
      if (dict[titleKey] !== undefined) {
        titleEls[t].setAttribute('title', dict[titleKey]);
      }
    }

    // Update all lang toggle buttons visual state
    var langBtns = document.querySelectorAll('.lang-toggle-btn');
    var isEn = (activeLang === 'en');
    for (var b = 0; b < langBtns.length; b++) {
      if (isEn) {
        langBtns[b].classList.add('is-en');
      } else {
        langBtns[b].classList.remove('is-en');
      }
      langBtns[b].setAttribute('aria-checked', String(isEn));
      langBtns[b].setAttribute('title', isEn ? 'Switch to Indonesian (ID)' : 'Ubah ke Bahasa Inggris (EN)');
    }
  };

  /**
   * Toggle between ID and EN — exposed globally on window so onclick="" works
   */
  window.toggleLanguage = function() {
    var current = document.documentElement.getAttribute('data-lang') || 'id';
    try {
      var stored = localStorage.getItem('pratama_lang');
      if (stored) current = stored;
    } catch(e) {}
    var target = (current === 'en') ? 'id' : 'en';
    window.setLanguage(target, true);
  };

  // Initial language preference lookup
  var initialLang = 'id';
  try {
    var _stored = localStorage.getItem('pratama_lang');
    if (_stored === 'id' || _stored === 'en') initialLang = _stored;
  } catch (e) {}

  // Early attribute set to prevent flash of untranslated content
  document.documentElement.setAttribute('data-lang', initialLang);

  // NOTE: Click binding and full DOM translation init is handled by
  // the inline script in app.blade.php (runs after DOM is fully ready).
  // translations.js only provides the dictionary (PRATAMA_TRANSLATIONS)
  // and helper functions (setLanguage, toggleLanguage) on window.
})();


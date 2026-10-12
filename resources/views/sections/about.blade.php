{{-- Page 4: 01 About Us (100% Matching PDF Page 4) --}}
<section id="about" class="relative w-full py-12 sm:py-16 lg:py-20 px-6 sm:px-12 lg:px-20 bg-cream text-ink transition-colors duration-400">
    <div class="max-w-[1440px] mx-auto">
        {{-- Header Bar: pratamaid (left) and 2026 (right) --}}
        <div class="flex items-center justify-between pb-8 sm:pb-12 text-xs sm:text-sm tracking-[0.22em] text-ink/70 font-sans">
            <span class="lowercase">pratamaid</span>
            <span>2026</span>
        </div>

        {{-- Main Split: 2-Column Text on Left, Tall Dining Photo on Right --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
            {{-- Left Area (Title + 2 Columns of Narrative) --}}
            <div class="lg:col-span-7 xl:col-span-8 flex flex-col space-y-6 sm:space-y-8">
                {{-- Section Title --}}
                <h2 class="font-sans font-normal text-4xl sm:text-5xl lg:text-6xl text-ink tracking-tight">
                    01 About Us
                </h2>

                {{-- 2-Column Body Copy (Exact wording from PDF Page 4) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 text-[12.5px] sm:text-[13.5px] leading-[1.7] text-ink/85 text-left font-sans">
                    {{-- Column 1 --}}
                    <div class="space-y-4">
                        <p>
                            PT Pratama Berkah Utama – Pratama Design Studio &amp; Build is a design and build company specializing in interior and exterior consultancy services. Established in August 2021, we focus on creating spaces that balance aesthetics with functionality, ensuring every design truly supports the needs and lifestyle of its users.
                        </p>
                        <p>
                            This commitment is reflected in our vision to become an interior company that does not only prioritize visual appeal, but also emphasizes functionality for the owner. We believe a well-designed space should simplify daily activities and enhance comfort. Therefore, we continuously integrate technology-based solutions and embrace innovation to deliver more efficient and relevant interior designs.
                        </p>
                        <p>
                            In line with this vision, our mission is to place user needs at the core of every design process. By deeply understanding each client’s requirements, we are able to translate their expectations into designs that are not only visually attractive, but also practical and purpose-driven.
                        </p>
                        <p>
                            Over the years, we have gained extensive experience handling various residential, retail, F&amp;B, and office projects. This allows us to offer competitive pricing while maintaining high quality standards. Accustomed to working within tight yet reasonable timelines, we ensure each project is completed efficiently without compromising results. To provide added value, we act as a one-stop solution for our clients, offering free pre-layout concepts and fit-out consultations prior to project agreements.
                        </p>
                    </div>

                    {{-- Column 2 --}}
                    <div class="space-y-4">
                        <p>
                            Throughout every project, our work is guided by strong core values: Professionalism, Integrity, Innovation, and Attention to Detail. These principles shape our work ethic and define the way we collaborate with clients and partners.
                        </p>
                        <p>
                            To accommodate diverse preferences, we work with a wide range of design styles, including modern minimalism, modern contemporary, modern luxury, Japandi, eclectic, classic, and many more. This flexibility allows us to tailor each project according to the client’s character and objectives.
                        </p>
                        <p>
                            Based in Jakarta, we are capable of handling projects nationwide. Supported by our own workshop and production facilities, we maintain quality control while ensuring efficient delivery to cities across Indonesia. Our studio consists of a dedicated core team of 4–5 professionals, supported by 10–12 skilled craftsmen in our workshop. This structure enables us to closely supervise every stage of the process, from concept to production.
                        </p>
                        <p>
                            What truly sets us apart is our flexibility in budget management. We are able to accommodate low-budget projects, premium segments, and high-end developments, ensuring every client receives the best possible solution within their budget range.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Right Area: Vertical Photo (Matching PDF Page 4) --}}
            <div class="lg:col-span-5 xl:col-span-4">
                <div class="relative w-full h-[450px] sm:h-[580px] lg:h-[720px] overflow-hidden">
                    <img src="{{ asset('assets/images/about.jpg') }}" 
                         alt="Dining and bar interior with textured green tiles and glowing brass lamp" 
                         class="w-full h-full object-cover object-center"
                         loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

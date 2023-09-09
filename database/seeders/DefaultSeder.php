<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DefaultSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'login' => 'admin',
                'password' => Hash::make('Password123!'),
                'active' => 1,
                'created_at' => '2023-09-07 13:29:30',
                'updated_at' => '2023-09-07 13:29:30',
            ],
            // Добавьте другие записи здесь, если есть
        ]);

        DB::table('clusters')->insert([

            [
                'id' => 1,
                'name' => 'BUILDING',
                'description' => 'description',
                'active' => 1,
                'created_at' => '2023-08-21 12:01:40',
                'updated_at' => '2023-08-21 12:01:40',
            ],
            [
                'id' => 2,
                'name' => 'NEIGHBORHOOD',
                'description' => 'description',
                'active' => 1,
                'created_at' => '2023-08-09 11:29:40',
                'updated_at' => '2023-08-21 12:01:10',
            ],
            [
                'id' => 3,
                'name' => 'CITY/REGION',
                'description' => 'description',
                'active' => 1,
                'created_at' => '2023-08-09 10:26:13',
                'updated_at' => '2023-08-21 12:00:02',
            ],
        ]);

        DB::table('cities')->insert([
            [
                'id' => 1,
                'name' => 'Basel',
                'alias' => 'basel',
                'description' => 'The city of Basel is unique due to its seamless integration of historical and modern architecture, creating a unique blend of aesthetics and functionality. The city\'s commitment to sustainable development is evident through its extensive network of pedestrian-friendly zones, efficient public transportation systems, and abundant green spaces. Additionally, Basel\'s strategic location at the tripoint of Switzerland, France, and Germany has influenced its urban planning, resulting in a cosmopolitan atmosphere that embraces cultural diversity and fosters international collaboration.',
                'latitude' => 47.5629644119970000,
                'longitude' => 7.5891713423267000,
                'location' => 'Switzerland Basel-Stadt',
                'image_main_path' => 'images/cities/basel/Basel.jpg',
                'active' => 1,
                'created_at' => '2023-08-09 10:23:55',
                'updated_at' => '2023-09-06 10:04:16',
            ],
        ]);

        DB::table('cases')->insert([
            [
                'id' => 1,
                'cluster_id' => 3,
                'city_id' => 1,
                'name' => 'URBAN VISION - BASEL 2050',
                'alias' => 'saaw3',
                'description' => "<i>Involvement platform for participatory and strategic city planning.</i>
<h2>I. Genesis</h2>
<p>Based on the Davos Declaration of the 2018 Conference of Culture Ministers, the Federal Council adopted the Building Culture Strategy in 2020. Among other things, the Action Plan for Measures proclaims the promotion of a high level of building culture, building culture awards, promoting building culture discourse, promoting building culture education, etc.</p>
<p>Since 2018, the Department of Urban Design & Architecture in cooperation with Urban Development of the Canton of Basel-Stadt has been reflecting on building culture and dealing with future issues in various formats under the umbrella of the Forum “Städtebau (Urban Design) Basel 2050\". This Forum, in particular its “Dialogue Days”, are to be seen as part of this strategy to convey and negotiate the city's building culture.</p>
<p>The industrial sites that are becoming vacant 113 hectares in total, which corresponds to 5% of the canton's territory. For this far-reaching urban planning perspective is required that establishes links between the individual areas and creates coherencies and connections. Basel 2050 has therefore set up an accompanying urban planning support group, consisting of a myriad of local stakeholders, to look at the impact forces in Basel's urban development.</p>
<p>The Forum was then jointly developed with the aim of presenting the urban planning considerations to date in the form of an overview exhibition and bringing them up for discussion (panel discussions). The Forum was quickly established as an open platform, at the center of which is the exchange of ideas.</p>
<p>The aim of Basel 2050 is also to expose processes with unpredictable results to critical examination, to keep an eye on the development of the city as a whole, and ultimately to learn from other transformations in the urban area.</p>

<h2>II. Triggers</h2>
<ul>
    <li>Current forecasts estimate the city’s population growing to 220,000 people by the year 2035.</li>
    <li>There is an urgent need for sustainable solutions for new forms of living and working, sustainable use of resources, climate protection and climate adaptation, biodiversity, mobility, and migration issues.</li>
    <li>Basel is confronted with climate change, the resource and biodiversity crisis, migration and new forms of living and working.</li>
    <li>Inadequate urban planning systems that address the different administrative units in the trinational area, innovative participatory formats as well as complex societal challenges creating a need for new urban instruments and platforms.</li>
</ul>

<h2>III. Transformational context</h2>
<p>In Basel, large areas of former industrial and infrastructure sites are available for new uses. All sites are planned with classic design instruments such as test planning or study commission procedures. Nevertheless, it shows that there are limits to the conventional planning instruments. A certain \"island character\" of the individual development plans cannot be denied.</p>
<p>Basel 2050 recognizes the importance of local knowledge and expertise. Therefore, the Dialogue Days provide a platform for residents to share their unique insights and experiences of living in the neighborhoods. Their input is valued and integrated into the decision-making process, allowing for a more inclusive and people-centered approach to urban planning.</p>
<p>One of the key approaches of Basel 2050 is to promote sustainable development. This includes incorporating green spaces, efficient transportation systems, and energy-efficient buildings into the neighborhoods. The project aims to create environmentally friendly and livable spaces for residents by prioritizing sustainability.</p>
<p>Another important aspect of Basel 2050 is the preservation of cultural heritage. The project seeks to retain the historical character of the neighborhoods while integrating contemporary elements. This approach ensures that the development respects and celebrates each neighborhood's unique identity and history.</p>
<p>The exercise is deliberately informal and experimental in a first step. Through the permanent reflection of individual processes and the negotiation of the complex forces of action, an idea for the long-term development of the city is to be outlined.</p>
<p>In the accompanying group, urban developments and concrete projects are presented and critically reflected. It focuses on the city as a whole. The group discusses the results produced by the project groups and provides impulses for their further work. The discursive planning process is thus to be consolidated. The accompanying group is called upon to go beyond the fixed, to sketch out questions and scenarios in an illustrative manner.</p>

<h2>IV. Action Journey</h2>
<p>The Dialogue Days is an important platform within Basel 2050 that emphasizes public involvement and engagement. It serves to actively involve the community in the development process and gather their insights, ideas, and concerns.</p>
<p>During the Dialogue Days, a series of interactive workshops, discussion platforms, and exhibitions are organized, creating opportunities for residents, local businesses, experts, and other stakeholders to come together and exchange their perspectives. This participatory approach ensures that the neighborhoods reflect the desires and values of the community, fostering a sense of ownership and belonging among residents. By actively involving residents in the decision-making process, the project intends to strengthen social cohesion and create a shared vision for the future of Basel. The aim is to foster meaningful dialogue and collaboration, ensuring that the development plans align with the needs and aspirations of the community. Here key topics and challenges related to urban development, such as sustainability, mobility, social inclusion, and cultural heritage are being addressed.</p>
<p>The Dialogue Days do not lead to decisions. The findings of the discussions publish in a conclusion which, as “Position” provides an important basis to form further urban development.</p>
<p>As an example, positions defined from Dialogue Day 2022 include, among others:</p>
<ol>
    <li>Basel needs additional identities!</li>
    <li>Public space belongs to everyone!</li>
    <li>Basel cooperates with its neighbours!</li>
    <li>Without participation, there is no lively city!</li>
    <li>Building in Basel means continuing to build!</li>
    <li>The development areas are Basel´s city laboratories!</li>
</ol>

<h2>V. Future</h2>
<p>The influence of Basel 2050 on the neighborhoods is multi-fold. that promote a high quality of life. Secondly, it contributes to the social fabric by foster Firstly, it will enhance the physical infrastructure and urban design, creating attractive and functional spaces in a sense of community, encouraging interaction, and providing spaces for social activities. Lastly, it has economic implications, attracting businesses, investors, and tourists, which can lead to job creation and economic growth in the neighborhoods. The Dialogue Days are being held every year.</p>

<h2>Annex I: Additional Links</h2>
<ul>
    <li><a href=\"https://www.basel2050.ch/index.php?page=dialogtage_2023&&content=programm\" target=\"_blank\">Basel 2050 - Dialogtage 2023</a></li>
    <li><a href=\"https://www.nau.ch/ort/basel/basel-stadt-startet-mit-dem-forum-stadtebau-basel-2050-66502802\" target=\"_blank\">Basel-Stadt launches \"Basel 2050\" Urban Development Forum (nau.ch)</a></li>
    <li><a href=\"https://www.bvd.bs.ch/nm/2023-forum-staedtebau-basel-2050--einladung-zu-den-oeffentlichen-dialogtagen-2023--identitaeten-staerken-bd.html\" target=\"_blank\">Staedtebau Basel 2050 (bvd.bs.ch)</a></li>
    <li><a href=\"https://openhouse-basel.org/plus/pop-up-forum-staedtebau-basel-2050-2/\" target=\"_blank\">Staedtebau Basel 2050 (openhouse-basel.org)</a></li>
</ul>

<h2>Annex II. Stakeholders</h2>
<ul>
    <li>Department of Urban Planning & Architecture of the Canton of Basel-Stadt</li>
    <li>Department of Construction and Transport of the Canton of Basel-Stadt</li>
    <li>in cooperation with</li>
    <li>Department of Cantonal and Urban Development of the Canton of Basel-Stadt</li>
    <li>Department of the Presidency of the Canton of Basel-Stadt</li>
    <li>Real Estate Basel-Stadt</li>
    <li>Department of Finance Canton of Basel-Stadt</li>
    <li>Facilitation of dialogue days and process</li>
    <li>S AM Swiss Museum of Architecture</li>
    <li>Kühne Wicki Future Stuff</li>
    <li>Dialogue partners</li>
    <li>Young Councillor and Youth Parliament of the Canton of Basel-Stadt</li>
    <li>Youth Council of the Canton of Basel-Landschaft</li>
    <li>Youth Council Lörrach, Germany</li>
    <li>District Secretariats Kleinbasel and Basel-West, Gundeldinger Coordination</li>
    <li>AGGLOBASEL</li>
    <li>BSA Association of Swiss Architects</li>
    <li>BSLA Association of Swiss Landscape Architects</li>
    <li>Christoph Merian Foundation</li>
    <li>FHNW Institute of Architecture</li>
    <li>Kühne Wicki Future Stuff</li>
    <li>SIA Swiss Society of Engineers and Architects</li>
    <li>Canton of Basel-Landschaft: BUD Office for Spatial Planning, BUD Building Authority</li>
    <li>Canton of Basel-Stadt: BVD Mobility, BVD Urban Design & Architecture, BVD City Gardening, ED Secondary Schools Vocational Training, FD Real Estate Basel-Stadt, PD Cantonal and Urban Development</li>
    <li>Presentation Partners</li>
    <li>Christoph-Merian Foundation, Basler Personenschifffahrt, kHaus, Theater Basel</li>
    <li>Patronage</li>
    <li>Federal Office of Culture</li>
</ul>",
                'latitude' => 47.5628268594290000,
                'longitude' => 7.5890962404723000,
                'location' => 'Kasernenstrasse 8, 4058 Basel',
                'image_main_path' => 'images/cases/saaw3/first/unnamed_(2).jpg',
                'active' => 1,
                'created_at' => '2023-08-09 10:41:42',
                'updated_at' => '2023-08-09 11:27:06',
            ],
            [
                'id' => 2,
                'cluster_id' => 2,
                'city_id' => 1,
                'name' => 'TRANSFORMING THE HAFENAREAL',
                'alias' => 'hafenareal',
                'description' => "<i>Re-thinking of the harbor zone into a new multifunctional district</i>
<h2>I. Genesis</h2>
<p>The transformation of the Hafenareal in Basel began more than 15 years ago, with initial discussions on urban development and harbor activities emerging in 2005 following the establishment of the Novartis Campus innovation and research center. Over the course of these 17 years, numerous initiatives, studies, and research projects have taken place.</p>
<p>Emerging from the chrysalis of a former harbor zone, the Hafenareal project is a visionary endeavor that captures the essence of urban evolution and redefines the very fabric of the cityscape. This re-imagined expanse of land, once characterized by the maritime industry, is poised to flourish anew as a vibrant, multifunctional district, blending history, innovation, and community. The waterfront promenade becomes a living testament to the project's spirit, where people gather to celebrate life, culture, and conviviality against the backdrop of the Rhine's tranquil embrace.</p>
<p>Sustainability forms the cornerstone of this metamorphosis. Harnessing renewable energies, green technologies, and mindful urban planning, the Hafenareal district takes bold strides towards a future where prosperity and environmental stewardship walk hand in hand. Rooftop gardens, solar panels, and rainwater harvesting redefine urban living, setting an example for sustainable cohabitation.</p>
<h2>II. Triggers</h2>
<p>At Klybeckquai and Westquai, the canton of Basel-Stadt has the unique opportunity to develop a large area from a single source. The relocation of today's port railway on Altrheinweg is the prerequisite for this urban development and ensures a future-proof port railway infrastructure. The Government Council has decided to present the \"Südquai\" option for relocating the port railway to the Greater Council. The port railway will be relocated to the port core area, the existing track systems south of the meadow will be abolished.</p>
<p>The removal of industrial production from the area leads to an open district which needs a new identity.</p>

<h2>III. Transformational context</h2>
<p>Official discussions specifically focused on the Hafenareal commenced in 2006 when the canton Basel-City initiated a study to explore the potential for further development in the Rheinhafen Klybeck-Kleinhüningen area. Feddersen & Klostermann were commissioned to devise a strategy for gradually transforming the harbor zone. Their proposal involved relocating the harbor to the second basin adjacent to Auhafen Muttenz. This relocation presented an opportunity to reshape the area into a new urban district.</p>
<p>Trinational Collaboration: The redevelopment of the Hafenareal has involved collaboration between Switzerland, France, and Germany. The shared competition-study launched by the three countries demonstrates a commitment to working together to create a cohesive and integrated district. This trinational collaboration has the potential to foster cross-border relationships, promote cultural exchange, and enhance regional cooperation.</p>
<h2>IV. Action Journey</h2>
<p>The economic structural change offers opportunity to redesign these spaces and open them up to the population. In this way, mixed districts with the urgently needed living and working spaces can be created. In order to make this transformation possible, the Canton of Basel-Stadt is investing in the expansion and partial relocation of the nationally important port and logistics infrastructure as well as in partnership-based planning with the landowners. The canton promotes urban development on vacant land, guarantees the necessary infrastructure and ensures that green and open spaces are also planned. District transformation and development is being implemented in several types of projects in different functional zones.</p>
<p>Among other urban projects that are taking place in the area, the “Klybeckplus” project – Not only the port, but Klybeck site also plan a new urban quarter on an area of around 300´000m2 and to open up to the population. Since the beginning of the transformation process in 2016 the population is invited to help shape the change. The population will continue to be involved in the planning. The conversion of the industrially used area into an open, green and mixed district occurs gradually over a long period of time. Quiet urban residential areas will alternate with areas for trade and services. Neighborhood uses are planned as well as a central school campus. A diverse range of living space in all price segments will create a district for the entire population.</p>
<p>IBA Basel 2020 project - true to its motto \"Growing together across borders\", it aims to concretize the shared responsibility for agglomeration in projects, buildings, infrastructures, and landscapes and provide impetus for a cross-border culture of cooperation.</p>
<p>The transformation of the Hafenareal in Basel has brought about changes in residential capacity, connectivity, urban functionality, cultural and industrial development, sustainability, heritage conservation, and cross-border collaboration. Together, these impacts contribute to the overall transformation and positive development of the district and its surrounding region.</p>
<p>The transformation of the Hafenareal in Basel has a significant impact on the city and the surrounding region. Today you can do gardening, skating, brunching, drinking a beer or eating fondue, graffiti, a place for long and noisy nights, a place of culture.</p>
<h2>V. Future</h2>
<p>Increased Residential Capacity: The redevelopment of the Hafenareal can allow for the creation of new housing options, accommodating at least 1,000 new residents. This increase in residential capacity has helped address the growing demand for housing in Basel and provided opportunities for people to live near the river and other amenities within the district.</p>
<p>Mixed-Use Development: The redevelopment of the Hafenareal has fostered a mixed-use approach, combining residential, commercial, and recreational spaces. The planning team has emphasized the integration of commercial zones with workplaces and residences, creating a diverse and vibrant urban environment. This approach promotes a walkable and livable district where residents can easily access amenities, services, and employment opportunities.</p>
<p>Heritage Conservation: The transformation of the Hafenareal has paid attention to preserving and integrating elements of historical heritage. Structures such as silos, storage buildings, and signal stations have been retained and incorporated into the new urban district. This preservation of historical elements not only adds to the cultural richness of the area but also maintains a sense of continuity and identity with the past.</p>
<p>Cultural and Industrial Hub: The vision for the transformed Hafenareal is to become a long-term cultural and industrial transitional district. The project aims to create a dynamic hub that attracts visitors, fosters creativity, and supports economic growth by incorporating cultural institutions, recreational areas, and industrial facilities. This cultural and industrial focus has the potential to generate employment, tourism, and innovation within the region.</p>
<p>Green Spaces and Sustainability: The redevelopment of the Hafenareal has prioritized sustainability and the integration of green spaces. The proposal to transform the railways between the districts into a green common space highlights the commitment to creating a sustainable environment. The project aims to enhance biodiversity, promote ecological balance, and provide residents with access to nature within an urban setting.</p>
<p>Ongoing projects:</p>
<ul>
    <li>Extension of the building rights in the ports, since 1999 until 2029, some up to 2049</li>
    <li>Klybeckquai/Westquai, since 2022</li>
    <li>Hafenbecken 3, ship-rail-road, from 2023</li>
    <li>District plan</li>
    <li>klybeckplus</li>
    <li>Rhein bridge, from 2029</li>
    <li>Port bridge</li>
    <li>Relocation/optimization of the port railway, from 2030</li>
    <li>Gateway Basel Nord</li>
</ul>
<h2>Annex I: Additional Links</h2>
<ul>
    <li><a href=\"https://www.bzbasel.ch/basel/basel-stadt/rueckblick-von-der-kieswueste-zum-sehnsuchtsort-zehn-jahre-zwischennutzung-auf-dem-basler-hafenareal-ld.2312048?reduced=true\" target=\"_blank\">Zehn Jahre Zwischennutzung am Basler Hafenareal (bzbasel.ch)</a></li>
    <li><a href=\"https://www.basel.com/de/attraktionen/hafen-a55b2a03c5\" target=\"_blank\">Hafen (basel.com)</a></li>
    <li><a href=\"https://www.hafen-stadt.ch/hafen-stadt\" target=\"_blank\">Hafen-Stadt.ch</a></li>
    <li><a href=\"https://www.klybeckplus.ch/startseite.html\" target=\"_blank\">klybeckplus.ch</a></li>
    <li><a href=\"https://www.entwicklung.bs.ch/stadtteile/transformationsareale.html\" target=\"_blank\">Entwicklungsgebiete (iba-basel.net)</a></li>
    <li><a href=\"#\" target=\"_blank\">port-of-switzerland.ch</a></li>
    <li><a href=\"https://www.raumplanung-staedtebau-stadtraum.bs.ch/arealentwicklung/klybeckquai---westquai.html\" target=\"_blank\">klybeckquai westquai(raumplanung-staedtebau-stadtraum.bs.ch)</a></li>
    <li><a href=\"https://wiewaersmalmit.ch/I_LAND-Basel-Im-Gesprach-mit-11-Projekten-auf-dem-Hafenareal\" target=\"_blank\">Projekten auf dem Hafenareal(wiewaersmalmit.ch)</a></li>
    <li><a href=\"https://www.bzbasel.ch/basel/basel-stadt/rueckblick-von-der-kieswueste-zum-sehnsuchtsort-zehn-jahre-zwischennutzung-auf-dem-basler-hafenareal-ld.2312048?reduced=true\" target=\"_blank\">hafenareal (bzbasel.ch)</a></li>
</ul>
<h2>Prof. Dr. Udo Weilacher, TU München (2023): Transformation Hafenareal Basel</h2>
<h2>Annex II. Stakeholders</h2>
<ul>
    <li>Political project control: Representatives of the landowners and the canton of Basel-Stadt. Overall responsibility for planning and participation</li>
    <li>Project management: Representatives of the landowners and the canton of Basel-Stadt. Technical planning, coordination and operational implementation of the project, together with cantonal departments and external partners</li>
    <li>Advisory board, district secretariats: Employees of the administration and the district secretariats. Interface between administration and district, district coordination as well as reflection, comment and support of the participation process</li>
    <li>Advisory board: External experts from the fields of urban planning, mobility, open space, profitability, etc. Technical support for project management and project management</li>
    <li>Departments and planning offices: Internal offices and experts from the cantonal administration, external planning offices and experts. Processing of subject-specific studies, questions and tasks</li>
    <li>Publicity: Basel population with special consideration of the Klybeck district and the adjacent Matthäus, Horburg, Rosental and Kleinhüningen districts. Participation as individuals (instead of as association representatives) in the public participation process</li>
    <li>Moderation participation: External specialist Advice on the participation process, conception, planning, implementation and documentation of participation events</li>
</ul></p>",
                'latitude' => 47.5827478290330000,
                'longitude' => 7.5894644000000000,
                'location' => 'Westquaistrasse 2, 4057 Basel, Switzerland',
                'image_main_path' => 'images/cases/hafenareal/first/Screenshot_2023-06-22_at_01.53.49_(1).png',
                'active' => 1,
                'created_at' => '2023-08-09 11:29:50',
                'updated_at' => '2023-08-09 11:29:50',
            ]
        ]);

        DB::table('case_images')->insert([
            [
                'id' => 21,
                'case_id' => 1,
                'image_paths' => 'images/cases/saaw3/second/unnamed_(1).jpg',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:27:06',
                'updated_at' => '2023-08-09 11:27:06',
            ],
            [
                'id' => 22,
                'case_id' => 1,
                'image_paths' => 'images/cases/saaw3/second/unnamed_(3).jpg',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:27:06',
                'updated_at' => '2023-08-09 11:27:06',
            ],
            [
                'id' => 23,
                'case_id' => 1,
                'image_paths' => 'images/cases/saaw3/second/unnamed_(7).png',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:27:06',
                'updated_at' => '2023-08-09 11:27:06',
            ],
            [
                'id' => 24,
                'case_id' => 1,
                'image_paths' => 'images/cases/saaw3/second/unnamed.jpg',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:27:06',
                'updated_at' => '2023-08-09 11:27:06',
            ],
            [
                'id' => 25,
                'case_id' => 2,
                'image_paths' => 'images/cases/hafenareal/second/unnamed_(1).png',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:29:50',
                'updated_at' => '2023-08-09 11:29:50',
            ],
            [
                'id' => 26,
                'case_id' => 2,
                'image_paths' => 'images/cases/hafenareal/second/unnamed_(2).png',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:29:50',
                'updated_at' => '2023-08-09 11:29:50',
            ],
            [
                'id' => 27,
                'case_id' => 2,
                'image_paths' => 'images/cases/hafenareal/second/unnamed_(3).png',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:29:50',
                'updated_at' => '2023-08-09 11:29:50',
            ],
            [
                'id' => 28,
                'case_id' => 2,
                'image_paths' => 'images/cases/hafenareal/second/unnamed_(4).jpg',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:29:50',
                'updated_at' => '2023-08-09 11:29:50',
            ],
            [
                'id' => 29,
                'case_id' => 2,
                'image_paths' => 'images/cases/hafenareal/second/unnamed_(4).png',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:29:50',
                'updated_at' => '2023-08-09 11:29:50',
            ],
            [
                'id' => 30,
                'case_id' => 2,
                'image_paths' => 'images/cases/hafenareal/second/unnamed_(5).png',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:29:50',
                'updated_at' => '2023-08-09 11:29:50',
            ],
            [
                'id' => 31,
                'case_id' => 2,
                'image_paths' => 'images/cases/hafenareal/second/unnamed_(6).png',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:29:50',
                'updated_at' => '2023-08-09 11:29:50',
            ],
            [
                'id' => 32,
                'case_id' => 2,
                'image_paths' => 'images/cases/hafenareal/second/unnamed_(8).png',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:29:50',
                'updated_at' => '2023-08-09 11:29:50',
            ],
            [
                'id' => 33,
                'case_id' => 2,
                'image_paths' => 'images/cases/hafenareal/second/unnamed_(9).png',
                'description' => null,
                'active' => 1,
                'created_at' => '2023-08-09 11:29:50',
                'updated_at' => '2023-08-09 11:29:50',
            ],
        ]);
    }
}

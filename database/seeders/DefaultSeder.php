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
                'name' => 'KASERNENHAUS',
                'alias' => 'saaw3',
                'description' => "<p>The former Kaserne is a centre for cultural, social and creative industries. In such places, there is a need to focus on generating innovations as well as preparing them for urban development. They are laboratories of the future, and this future must be sustainable. The city's administration does not have to everyday-operate of the K-Haus itself. It is not the government's core competence. The city was in the lead for the development, and I practised letting go. </p>
<p>Originally built between 1860 and 1863 by the renowned Basel architect Johann Jakob Stehlin-Burckhardt, the Kasernen Haus has a rich history. Over the years, it has evolved into a focal point for free-spirited culture and civic initiatives, making it a cherished part of Basel's cultural heritage. The Kasernen Haus has been transformed into a modern and multifunctional cultural centre known as kHaus through meticulous design and restoration. This state-of-the-art facility seamlessly integrates the old and the new, offering contemporary amenities while preserving the building's authentic character. kHaus is a dynamic space that provides boundless opportunities for cultural expression and community interaction, from art exhibitions, theatrical performances, and live music concerts to thought-provoking lectures and workshops, kHaus is set to become a thriving epicentre of artistic and intellectual exchange. </p>
<p>The transformation of kHaus has a significant influence on the neighbourhood, revitalizing and enhancing the overall community experience. </p>
<ul>
  <li>Social and Cultural Hub: kHaus serves as a new social and cultural hub within the neighbourhood. By offering diverse cultural events, exhibitions, performances, and workshops, it attracts residents and visitors alike, fostering a sense of community and providing opportunities for engagement and interaction. </li>
  <li>Economic Growth: The presence of kHaus contributes to the neighbourhood's economic growth. As a centre for creative businesses, studios, and co-working spaces, it attracts entrepreneurs, artists, and professionals, generating employment opportunities and supporting local businesses in the surrounding area. </li>
  <li>Increased Foot Traffic: The vibrant programming and events held at kHaus draw more people to the neighbourhood. This increased foot traffic benefits local businesses such as cafes, restaurants, and shops, creating a positive ripple effect on the area's economic vitality. </li>
<li>Urban Regeneration: The transformation of kHaus contributes to the urban regeneration of the neighbourhood. The revitalization of an iconic building enhances its aesthetic appeal and sparks interest and investment in the surrounding properties. This can lead to further renovations and improvements in the neighbourhood, positively impacting property values and overall urban development. </li>
<li>Community Engagement: kHaus provides a platform for community engagement and participation. It serves as a gathering space for residents, fostering a sense of belonging and promoting social cohesion. Community-led initiatives and collaborations may also find a home within kHaus, further strengthening community ties and fostering a shared sense of ownership and pride. </li>
<li>Preservation of Heritage: By transforming the historic Kasernen Haus, the neighbourhood retains an essential piece of its cultural heritage. Preserving such a significant landmark contributes to the community's sense of identity and history, creating a connection between the past, present, and future. </li>
<p>The transformation of kHaus enriches the overall quality of life for residents and visitors, making the neighbourhood an even more attractive and dynamic place to live, work, and explore.</p>",
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
                'name' => 'HAFENAREAL',
                'alias' => 'hafenareal',
                'description' => "<p>The transformation of the Hafenareal in Basel began more than 15 years ago, with initial discussions on urban development and harbor activities emerging in 2005 following the establishment of the Novartis Campus innovation and research center. Over the course of these 17 years, numerous initiatives, studies, and research projects have taken place.
Official discussions specifically focused on the Hafenareal commenced in 2006 when the canton Basel-City initiated a study to explore the potential for further development in the Rheinhafen Klybeck-Kleinhüningen area. Feddersen & Klostermann were commissioned to devise a strategy for gradually transforming the harbor zone. Their proposal involved relocating the harbor to the second basin adjacent to Auhafen Muttenz. This relocation presented an opportunity to reshape the area into a new urban district. </p>
<p>The transformation of the Hafenareal in Basel has a significant impact on the city and the surrounding region. </p>
<ul>
<li>Increased Residential Capacity: The redevelopment of the Hafenareal can allow for the creation of new housing options, accommodating at least 1,000 new residents. This increase in residential capacity has helped address the growing demand for housing in Basel and provided opportunities for people to live in close proximity to the river and other amenities within the district. </li>

<li>Enhanced Connectivity: The transformation of the Hafenareal has improved connectivity within the region. The construction of a new bridge connecting Switzerland to France, as proposed by MVRDV in their winning proposal, has strengthened transportation links between the two countries. This enhanced connectivity has facilitated cross-border movement and contributed to the integration of the region. </li>
<li>Mixed-Use Development: The redevelopment of the Hafenareal has fostered a mixed-use approach, combining residential, commercial, and recreational spaces. The planning team has emphasized the integration of commercial zones with workplaces and residences, creating a diverse and vibrant urban environment. This approach promotes a walkable and livable district where residents can easily access amenities, services, and employment opportunities. </li>

<li>Cultural and Industrial Hub: The vision for the transformed Hafenareal is to become a long-term cultural and industrial trinational district. By incorporating cultural institutions, recreational areas, and industrial facilities, the project aims to create a dynamic hub that attracts visitors, fosters creativity, and supports economic growth. This cultural and industrial focus has the potential to generate employment, tourism, and innovation within the region. </li>
<li>Green Spaces and Sustainability: The redevelopment of the Hafenareal has prioritized sustainability and the integration of green spaces. The proposal to transform the railways between the districts into a green common space highlights the commitment to creating a sustainable environment. The project aims to enhance biodiversity, promote ecological balance, and provide residents with access to nature within an urban setting. </li>
<li>Heritage Conservation: The transformation of the Hafenareal has paid attention to preserving and integrating elements of historical heritage. Structures such as silos, storage buildings, and signal stations have been retained and incorporated into the new urban district. This preservation of historical elements not only adds to the cultural richness of the area but also maintains a sense of continuity and identity with the past. </li>

<li>Trinational Collaboration: The redevelopment of the Hafenareal has involved collaboration between Switzerland, France, and Germany. The shared competition-study launched by the three countries demonstrates a commitment to working together to create a cohesive and integrated district. This trinational collaboration has the potential to foster cross-border relationships, promote cultural exchange, and enhance regional cooperation. </li>

<p>The transformation of the Hafenareal in Basel has brought about changes in residential capacity, connectivity, urban functionality, cultural and industrial development, sustainability, heritage conservation, and cross-border collaboration. Together, these impacts contribute to the overall transformation and positive development of the district and its surrounding region.</p>",
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

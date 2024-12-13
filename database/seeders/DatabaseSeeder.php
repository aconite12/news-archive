<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\News;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mark Jemuel Menguito',
            'email' => 'MJ@test.com',
            'password' => '123',
        ]);
        User::factory()->create([
            'name' => 'Raven Glenn Lagmay',
            'email' => 'raven@test.com',
            'password' => '1231',
        ]);
        User::factory()->create([
            'name' => 'John Andrei Centeno',
            'email' => 'andrei@test.com',
            'password' => '1232',
        ]);

        News::create([
            'headline' => 'Tech Giants Announce Collaboration on AI Development',
            'content' => 'In a groundbreaking move, leading technology companies have joined forces to accelerate advancements in artificial intelligence. This collaboration aims to tackle global challenges such as climate change, healthcare accessibility, and sustainable energy. Experts believe this partnership could revolutionize industries and redefine the future of AI-driven solutions.',
            'author' => 'Mark Jemuel Menguito',
            'date_published' => '2024-12-01',
            'user_id' => 1,
        ]);
        News::create([
            'headline' => 'Historic Milestone: New Vaccine Approved for Global Distribution',
            'content' => 'The World Health Organization has approved a groundbreaking vaccine that promises to combat infectious diseases in record time. Developed using cutting-edge biotechnology, the vaccine has shown remarkable efficacy in clinical trials. Governments worldwide are preparing for a swift rollout to ensure public safety.',
            'author' => 'Raven Glenn Lagmay',
            'date_published' => '2024-12-10',
            'user_id' => 2,
        ]);
        News::create([
            'headline' => 'Global Markets Surge Amid Positive Economic Outlook',
            'content' => 'Stock markets worldwide have experienced a significant surge following optimistic economic forecasts. Analysts attribute the growth to increased consumer confidence and technological advancements. Investors are eyeing sectors like renewable energy and fintech for promising opportunities.',
            'author' => 'John Andrei Centeno',
            'date_published' => '2024-12-2',
            'user_id' => 3,
        ]);
        News::create([
            'headline' => 'Local Community Rallies to Support Flood Victims',
            'content' => "Residents of a small town have come together to support families affected by recent floods. Volunteers are distributing essential supplies, and local businesses have pledged significant donations. This heartwarming display of unity highlights the community's resilience and compassion during challenging times.",
            'author' => 'Mark Jemuel Menguito',
            'date_published' => '2024-12-5',
            'user_id' => 1,
        ]);
        News::create([
            'headline' => 'Sports Legend Announces Retirement After Decades of Success',
            'content' => 'After a career spanning over two decades, the sports world bids farewell to a legend. The athlete, known for their unparalleled skill and sportsmanship, has announced their retirement. Fans and fellow athletes have taken to social media to celebrate their illustrious career and enduring legacy.',
            'author' => 'Raven Glenn Lagmay',
            'date_published' => '2024-12-6',
            'user_id' => 2,
        ]);
        News::create([
            'headline' => 'Breakthrough in Space Exploration: New Planet Discovered',
            'content' => "Astronomers have discovered a potentially habitable planet located in a distant galaxy. The discovery, made using advanced telescopes, has sparked excitement among scientists and space enthusiasts. The planet, named 'ExoPrime,' could provide valuable insights into the existence of extraterrestrial life.",
            'author' => 'John Andrei Centeno',
            'date_published' => '2024-11-1',
            'user_id' => 3,
        ]);
        News::create([
            'headline' => 'Innovative Startup Launches Eco-Friendly Transportation Solution',
            'content' => 'A startup has unveiled a revolutionary electric vehicle that promises to redefine urban transportation. With zero emissions and smart features, the vehicle is designed to address traffic congestion and environmental concerns. Early adopters have praised its sleek design and affordability.',
            'author' => 'Raven Glenn Lagmay',
            'date_published' => '2024-11-20',
            'user_id' => 2,
        ]);
    }
}

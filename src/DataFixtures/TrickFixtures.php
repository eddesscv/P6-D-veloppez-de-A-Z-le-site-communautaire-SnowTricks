<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Image;
use App\Entity\Trick;
use App\Entity\Video;
use App\Entity\Comment;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class TrickFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('FR-fr');

        $users = [];
        $categories = [];
        $genders = ['male', 'female'];
        $categoriesDemoName = ['Grabs', 'Rotations', 'Flips', 'Rotations désaxées', 'Slides', 'One foot', 'Old school'];
        $tricksDemoName = ['Mute', 'Indy', '360', '720', 'Backflip', 'Misty', 'Tail slide', 'Method air', 'Backside air', 'Frontside boardslide'];

        // 3 Users
        for ($i = 0; $i < 3; $i++) {
            $user = new User();

            $gender = $faker->randomElement($genders);

            $user->setUsername($faker->userName)
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setEmail($faker->safeEmail)
                ->setPassword($this->encoder->encodePassword($user, 'password'))
                ->setPassword($faker->password)
                ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                ->setIsVerified(true)
                ->setImagePath('https://randomuser.me')
                ->setImageName('api/portraits/' . ($gender == 'male' ? 'men/' : 'women/') . $faker->numberBetween(1, 99) . '.jpg');
            $manager->persist($user);
            $users[] = $user;
        }

        // 7 Category
        foreach ($categoriesDemoName as $categoryTitle) {
            $category = new Category();
            $category->setTitle($categoryTitle);

            $manager->persist($category);
            $categories[] = $category;
        }

        // 10 Tricks
        foreach ($tricksDemoName as $trickTitle) {
            $trick = new Trick();
            $trick->setTitle($trickTitle)
                ->setDescription($faker->paragraph(5))
                ->setCreatedAt(new \Datetime)
                ->setUpdatedAt(new \Datetime)
                ->setSlug($faker->slug)
                ->setUser($faker->randomElement($users))
                ->setCategory($faker->randomElement($categories));

            // 3 Image by Trick
            for ($k = 1; $k < 4; $k++) {
                $image = new Image();
                $image/* ->setPath('img/tricks')
                    ->setTitle($trick->getTitle() . ' ' . $k . '.jpg') */
                    ->setPath('https://picsum.photos/1440/900?random=2')
                    ->setTitle($trick->getTitle() . ' ' . $k . '.jpg')
                    ->setAlt('Image du trick' . $trick->getTitle())
                    ->setTrick($trick);

                $manager->persist($image);

                if ($k === 3) {
                    // Last Image become the main one
                    $trick->setMainImage($image);
                    $manager->persist($trick);
                }
            }

            // 1 to 2 Video by Trick
            for ($l = 0; $l < mt_rand(1, 2); $l++) {
                $video = new Video();
                $video->setUrl('https://www.youtube.com/watch?v=tHHxTHZwFUw')
                    ->setTrick($trick);

                $manager->persist($video);
            }

            // 0 to 12 Comment by Trick
            for ($m = 0; $m < mt_rand(0, 12); $m++) {
                $comment = new Comment();
                $comment->setContent($faker->sentence(mt_rand(1, 5)))
                    ->setCreatedAt(new \Datetime)
                    ->setUser($faker->randomElement($users))
                    ->setTrick($trick);

                $manager->persist($comment);
            }
        }

        $manager->flush();
    }
}

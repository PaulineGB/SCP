<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Image;

class ImageFixtures extends Fixture
{
    const IMAGES = [
        'https://www.telerama.fr/sites/tr_master/files/styles/simplecrop1000/public/medias/2016/10/media_149075/les-obsessions-de-charles-burns%2CM383677.jpg?itok=iZLk5hiA',
        'https://cdn.radiofrance.fr/s3/cruiser-production/2019/11/d009d74d-b29f-4d35-85e1-1b02dfc7c105/838_burns_2.jpg',
        'https://images.bfmtv.com/eA5SOosVd_bxSEIRw3F9lOMvYCY=/0x0:662x859/600x0/images/-111373.jpg',
        'https://www.galeriemartel.com/wp-content/uploads/2013/05/burns_ser_dedales.jpg',
        'https://www.pierrefeuilleciseaux.com/wp-content/uploads/2015/06/Charles-Burns-exemple-4.jpg',
        'https://www.2dgalleries.com/planches/800W/2020/23/burns-freak-show-2n1c.jpg',
        'https://www.dca-art.com/sites/default/files/expo_mav/burns16-038.jpg',
        'https://i2.wp.com/www.bodoi.info/wp-content/uploads/2015/11/13_04facetasmbooksp.jpg?resize=325%2C393',
        'https://www.undernierlivre.net/wp-content/uploads/2014/11/burns_black-hole_black-circle_2000.jpg',
        'https://img.over-blog-kiwi.com/0/93/16/08/20161106/ob_ed399f_img-0201.JPG',
        'https://larevuedespectateurs.artecom.studio/2019/wp-content/uploads/sites/2/2019/12/burns2-1024x915.jpg',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::IMAGES as $key => $imageLink) {
            $image = new Image();
            $image->setImageLink($imageLink);
            $manager->persist($image);
            $this->addReference('image_' . $key, $image);
        }

        $manager->flush();
    }
}

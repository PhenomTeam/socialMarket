<?php
/**
 * Created by PhpStorm.
 * User: manhtoan
 * Date: 7/19/15
 * Time: 6:36 PM
 */

namespace Phenom\WafeeeBundle\Doctrine;

use Doctrine\ORM\Id\AbstractIdGenerator;

class RandomIdGenerator extends AbstractIdGenerator{
    public function generate(\Doctrine\ORM\EntityManager $em, $entity)
    {
        $entity_name = $em->getClassMetadata(get_class($entity))->getName();

        while (true)
        {
            $id = md5(uniqid(mt_rand(), true));
            $item = $em->find($entity_name, $id);

            if (!$item)
            {
                return $id;
            }
        }

        throw new \Exception('RandomIdGenerator worked hard, but could not generate unique ID :(');
    }
}
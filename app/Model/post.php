<?php
/**
 * File is used as post model
 *
 * Contains code needed mainly to get the post-related work done
 *
 * PHP version 5
 *
 * @category Model
 * @package  Blog

 */

/**
 * post model class
 *
 * @category Model
 * @package  Blog

 */
class Post extends AppModel
{

    /**
     * Property is used to name the content types model.
     *
     * @var string $name of the model
     * @since 1.0.0 - May 10, 2010
     */
    var $name = 'Post';

    /**
     * Property is used to containable behavior and file model model.
     *
     * @var string $actAs of the model
     * @since 1.0.0 - May 10, 2010
     */    
    var $actsAs = array(
                   'FileModel', 'Containable'
                  );

    /**
     * Property is used to association one to one association.
     *
     * @var string $hasMany of the model
     * @since 1.0.0 - May 10, 2010
     */  
    var $belongsTo = array('User' => array('className' => 'User')); 

    /**
     * Property is used to association one to many association.
     *
     * @var string $hasMany of the model
     * @since 1.0.0 - May 10, 2010
     */    
     var $hasMany = array('Comment' => array('className' => 'Comment')); 

    /**
     * Property is used to has and belongs to association.
     *
     * @var string $hasAndBelongsToMany of the model
     * @since 1.0.0 - May 10, 2010
     */
     var $hasAndBelongsToMany = array(
                                 'Tag' => array(
                                           'className'             => 'Tag',
                                           'joinTable'             => 'posts_tags',
                                           'foreignKey'            => 'post_id',
                                           'associationForeignKey' => 'tag_id',
                                          ),
                                );
  
    /**
     * Property is used to validation.
     *
     * @var string $validate of the model
     * @since 1.0.0 - May 10, 2010
     */    
    var $validate = array(
                     'title' => array('rule' => 'notEmpty'),
                     'body'  => array('rule' => 'notEmpty'), 
                     'name'  => array('rule' => 'notEmpty'),
                     'email' => array('rule' => 'notEmpty'),
                     'text'  => array('rule' => 'notEmpty'),                             
                    );


}//end class





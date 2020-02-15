<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 13/02/2020
 * Time: 13:37
 **/

namespace App\Repositories\Sdz;

use App\Models\Sdz\Tag;
use Illuminate\Support\Str;


class TagRepository
{
    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function store($post, $tags)
    {
        // On crée un tableau enutilisant le séparateur virgule :
        $tags = explode(',', $tags);

        foreach ($tags as $tag) {

            $tag = trim($tag);

            $tag_url = Str::slug($tag);

            // On regarde si ce tag existe déjà :
            $tag_ref = $this->tag->where('tag_url', $tag_url)->first();

            /* Si le Tag n'existe pas encore, alors on le créee,
                et on référencie la table pivot,
                cad qu'on effectue une enregistrement dans la Table d'association : */
            if(is_null($tag_ref)) { 
                $tag_ref = new $this->tag([
                   'tag' => $tag,
                   'tag_url' => $tag_url
                ]); 
                $post->tags()->save($tag_ref);
            }
            else { // Si le Tag existe déjà, on se contente d'informer la table pivot avec la méthode "attach" :
                $post->tags()->attach($tag_ref->id);
            }
        }
    }

}
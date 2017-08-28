<?php

/*============================================================
 *  DependencyInjector Singleton Class Defination
 *  ver:    0.0.1
 *  descp:  Singleton: stores dependencies 
 *  Use:    Use set() method to store dependencies and
 *          get() method to retrive any stores dependencies.
 *          Use instance() method to retrive the obj of this 
 *          class.
 *============================================================
 */

namespace Src\Utils;
use Src\Exceptions\NotFoundException;

class DependencyInjector 
{
    private $data = [];     // stores all dependency objects
    private static 
        $instance = null;   // Stores instance of this 
                            // singleton class
    
    /* public (set) 
     * descp: sets dependencies
     * params:  string $name    => name of dependency
     *          $dependency     => Obj of dependency
     * ret:     null
     */
    public function set(string $name, $dependency)
    {
        $data[$name] = $dependency;
    }
    
    /* public (get) throwable 
     * descp: gets dependencies
     * params:  string $name    => name of the dependency
     * ret: dependency obj if name exists otherwise
     *      throws a NotFoundException object.
     */
    public function get(string $name)
    {
        if (isset($data[$name])) {
            return $data[$name];
        }
        throw new NotFoundException('Dependency Not Found');
    }
    
    /* public static (instance) 
     * descp: creates a singleton obj of this class
     * params:  none
     * ret:     The DependencyInjector obj. 
     */
    public static function instance() : DependencyInjector 
    {
        if ($instance === null) {
            $instance = new DependencyInjector();
        }
        return $instance;
    }
}
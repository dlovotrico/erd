<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }


/**
 * <h1>EXECUTION CONTROL AND STATE</h1>
 * <p>When called it works directly with <code>Executor()</code> in order to determine the optimal way to end the 
 * program.</p> 
 * 
 * 
 * 
 * 
 * <h2>[WORKING NOTES]</h2>
 * <ul>
 *   <li>The idea is not ending the program ASAP when a critical error arises, but letting Executor() try to find out
 *   an elegant way to end it. For example, if a requested critical controller is broken or for some reason deleted, 
 *   but the site's basic structure is still present, Executor() will wait until the site's basic structure loads and
 *   then kill the program instead of leaving on screen a mess with some error message.</li>
 * </ul>
 * 
 * 
 * 
 * 
 *  
 * @author          D.Lovotrico <dlov@nucleoid.net>
 * 
 * @version         Version 0.1
 * @since           Version 0.1
 *
 * @category        System
 * @category        Program execution
 * @category        Program control
 */

 class Terminator {
     // Coming soon ...
 } // Terminator()
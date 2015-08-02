<?php 
/**
 * Copyright 2015 Dirk Groenen 
 *
 * (c) Dirk Groenen <dirk@bitlabs.nl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DirkGroenen\Pinterest\Endpoints;

use DirkGroenen\Pinterest\Models\Board;
use DirkGroenen\Pinterest\Models\Collection;

class Boards extends Endpoint {

    /**
     * Find the provided board
     * 
     * @access public
     * @param string    $board_id
     * @param array     $data
     * @return Models\Board
     */
    public function get( $board_id, array $data = [] )
    {
        $board = $this->request->get( sprintf("boards/%s", $board_id), $data );
        return new Board( $this->master, $board );
    }

    /**
     * Create a new board
     *
     * @access public
     * @param  array    $data
     * @return Models\Board
     */
    public function create( array $data )
    {
        $board = $this->request->post( "boards", $data );
        return new Board( $this->master, $board );
    }

    /**
     * Delete a board
     *
     * @access public
     * @param  string    $board_id
     * @return Models\Board
     */
    public function delete( $board_id )
    {
        $board = $this->request->delete( sprintf("boards/%s", $board_id) );
        return new Board( $this->master, $board );
    }
}
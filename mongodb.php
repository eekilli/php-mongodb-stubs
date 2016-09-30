<?php

/**
 * Use this stub if you are stuck with the 1.0.0 stub.
 */

namespace MongoDB\Driver
{
    /**
     * MongoDB\Driver\ReadConcern controls the level of isolation for read operations
     * for replica sets and replica set shards. This option requires the WiredTiger
     * storage engine and MongoDB 3.2 or later.
     *
     * @since mongodb >= 1.1.0
     */
    class ReadConcern
    {
        const LOCAL = 'local';
        const MAJORITY = 'majority';

        /**
         * ReadConcern constructor.
         *
         * Levels:
         * - ReadConcern::LOCAL
         *   Queries using this read concern will return the node's most recent copy
         *   of the data. This provides no guarantee that the data has been written
         *   to a majority of the nodes (i.e. it may be rolled back).
         *   This is the default read concern level.
         *
         * - ReadConcern::MAJORITY
         *   Queries using this read concern will return the node's most recent copy
         *   of the data confirmed as having been written to a majority of the nodes
         *   (i.e. the data cannot be rolled back).
         *
         * @param string $level
         */
        public function __construct($level = ReadConcern::LOCAL)
        {
        }

        /**
         * @return string|null
         */
        public function getLevel() {}
    }
}
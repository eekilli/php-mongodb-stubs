<?php

/**
 * API stub references derived from public documentation.
 *
 * Last update: 2016-09-30 16:45:00
 *
 * @see http://mongodb.github.io/mongo-php-library/api/
 */

namespace MongoDB\Exception
{
    interface Exception extends \MongoDB\Driver\Exception\Exception
    {
    }

    class RuntimeException extends \MongoDB\Driver\Exception\RuntimeException implements Exception
    {
    }

    class UnexpectedValueException extends \MongoDB\Driver\Exception\UnexpectedValueException implements Exception
    {
    }

    class BadMethodCallException extends \BadMethodCallException implements Exception
    {
        /**
         * Thrown when a mutable method is invoked on an immutable object.
         *
         * @param string $class Class name
         * @return self
         */
        public static function classIsImmutable($class)
        {
        }

        /**
         * Thrown when accessing a result field on an unacknowledged write result.
         *
         * @param string $method Method name
         * @return self
         */
        public static function unacknowledgedWriteResultAccess($method)
        {
        }
    }

    class InvalidArgumentException extends \MongoDB\Driver\Exception\InvalidArgumentException implements Exception
    {
        /**
         * Thrown when an argument or option has an invalid type.
         *
         * @param string $name Name of the argument or option
         * @param mixed $value Actual value (used to derive the type)
         * @param string $expectedType Expected type
         * @return self
         */
        public static function invalidType($name, $value, $expectedType)
        {
        }
    }
}

namespace MongoDB
{

    use stdClass;
    use Traversable;
    use MongoDB\Driver\Cursor;
    use MongoDB\Model\IndexInfoIterator;
    use MongoDB\Model\CollectionInfoIterator;
    use MongoDB\Driver\ReadConcern;
    use MongoDB\Driver\Server;
    use MongoDB\Exception\InvalidArgumentException;
    use MongoDB\Model\DatabaseInfoIterator;
    use MongoDB\Driver\WriteResult;
    use MongoDB\Exception\BadMethodCallException;
    use MongoDB\Driver\Manager;

    /**
     * Extracts an ID from an inserted document.
     *
     * This function is used when BulkWrite::insert() does not return a generated
     * ID, which means that the ID should be fetched from an array offset, public
     * property, or in the data returned by bsonSerialize().
     *
     * @internal
     * @see https://jira.mongodb.org/browse/PHPC-382
     * @param array|object $document Inserted document
     * @return mixed
     */
    function extract_id_from_inserted_document($document)
    {
    }

    /**
     * Generate an index name from a key specification.
     *
     * @internal
     * @param array|object $document Document containing fields mapped to values,
     *                               which denote order or an index type
     * @return string
     * @throws InvalidArgumentException
     */
    function generate_index_name($document)
    {
    }

    /**
     * Return whether the first key in the document starts with a "$" character.
     *
     * This is used for differentiating update and replacement documents.
     *
     * @internal
     * @param array|object $document Update or replacement document
     * @return boolean
     * @throws InvalidArgumentException
     */
    function is_first_key_operator($document)
    {
    }

    /**
     * Return whether the aggregation pipeline ends with an $out operator.
     *
     * This is used for determining whether the aggregation pipeline msut be
     * executed against a primary server.
     *
     * @internal
     * @param array $pipeline List of pipeline operations
     * @return boolean
     */
    function is_last_pipeline_operator_out(array $pipeline)
    {
    }

    /**
     * Converts a ReadConcern instance to a stdClass for use in a BSON document.
     *
     * @internal
     * @see https://jira.mongodb.org/browse/PHPC-498
     * @param ReadConcern $readConcern Read concern
     * @return stdClass
     */
    function read_concern_as_document(ReadConcern $readConcern)
    {
    }

    /**
     * Return whether the server supports a particular feature.
     *
     * @internal
     * @param Server $server Server to check
     * @param integer $feature Feature constant (i.e. wire protocol version)
     * @return boolean
     */
    function server_supports_feature(Server $server, $feature)
    {
    }

    /**
     * @param mixed $input
     * @return boolean
     */
    function is_string_array($input)
    {
    }


    class Client
    {
        /**
         * Constructs a new Client instance.
         *
         * This is the preferred class for connecting to a MongoDB server or
         * cluster of servers. It serves as a gateway for accessing individual
         * databases and collections.
         *
         * Supported driver-specific options:
         *
         *  * typeMap (array): Default type map for cursors and BSON documents.
         *
         * Other options are documented in MongoDB\Driver\Manager::__construct().
         *
         * @see http://docs.mongodb.org/manual/reference/connection-string/
         * @see http://php.net/manual/en/mongodb-driver-manager.construct.php
         * @see http://php.net/manual/en/mongodb.persistence.php#mongodb.persistence.typemaps
         * @param string $uri MongoDB connection string
         * @param array $uriOptions Additional connection string options
         * @param array $driverOptions Driver-specific options
         * @throws InvalidArgumentException
         */
        public function __construct($uri = 'mongodb://localhost:27017', array $uriOptions = [], array $driverOptions = [])
        {
        }

        /**
         * Return internal properties for debugging purposes.
         *
         * @see http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.debuginfo
         * @return array
         */
        public function __debugInfo()
        {
        }

        /**
         * Select a database.
         *
         * Note: databases whose names contain special characters (e.g. "-") may
         * be selected with complex syntax (e.g. $client->{"that-database"}) or
         * {@link selectDatabase()}.
         *
         * @see http://php.net/oop5.overloading#object.get
         * @see http://php.net/types.string#language.types.string.parsing.complex
         * @param string $databaseName Name of the database to select
         * @return Database
         */
        public function __get($databaseName)
        {
        }

        /**
         * Return the connection string (i.e. URI).
         *
         * @return string
         */
        public function __toString()
        {
        }

        /**
         * Drop a database.
         *
         * @see DropDatabase::__construct() for supported options
         * @param string $databaseName Database name
         * @param array $options Additional options
         * @return array|object Command result document
         */
        public function dropDatabase($databaseName, array $options = [])
        {
        }

        /**
         * List databases.
         *
         * @see ListDatabases::__construct() for supported options
         * @param array $options
         * @return DatabaseInfoIterator
         */
        public function listDatabases(array $options = [])
        {
        }

        /**
         * Select a collection.
         *
         * @see Collection::__construct() for supported options
         * @param string $databaseName Name of the database containing the collection
         * @param string $collectionName Name of the collection to select
         * @param array $options Collection constructor options
         * @return Collection
         */
        public function selectCollection($databaseName, $collectionName, array $options = [])
        {
        }

        /**
         * Select a database.
         *
         * @see Database::__construct() for supported options
         * @param string $databaseName Name of the database to select
         * @param array $options Database constructor options
         * @return Database
         */
        public function selectDatabase($databaseName, array $options = [])
        {
        }
    }

    /**
     * Result class for a bulk write operation.
     */
    class BulkWriteResult
    {
        /**
         * Constructor.
         *
         * @param WriteResult $writeResult
         * @param mixed[] $insertedIds
         */
        public function __construct(WriteResult $writeResult, array $insertedIds)
        {
        }

        /**
         * Return the number of documents that were deleted.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see BulkWriteResult::isAcknowledged()
         * @return integer
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getDeletedCount()
        {
        }

        /**
         * Return the number of documents that were inserted.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see BulkWriteResult::isAcknowledged()
         * @return integer
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getInsertedCount()
        {
        }

        /**
         * Return a map of the inserted documents' IDs.
         *
         * The index of each ID in the map corresponds to the document's position in
         * the bulk operation. If the document had an ID prior to insertion (i.e.
         * the driver did not generate an ID), this will contain its "_id" field
         * value. Any driver-generated ID will be an MongoDB\BSON\ObjectID instance.
         *
         * @return mixed[]
         */
        public function getInsertedIds()
        {
        }

        /**
         * Return the number of documents that were matched by the filter.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see BulkWriteResult::isAcknowledged()
         * @return integer
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getMatchedCount()
        {
        }

        /**
         * Return the number of documents that were modified.
         *
         * This value is undefined (i.e. null) if the write executed as a legacy
         * operation instead of command.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see BulkWriteResult::isAcknowledged()
         * @return integer|null
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getModifiedCount()
        {
        }

        /**
         * Return the number of documents that were upserted.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see BulkWriteResult::isAcknowledged()
         * @return integer
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getUpsertedCount()
        {
        }

        /**
         * Return a map of the upserted documents' IDs.
         *
         * The index of each ID in the map corresponds to the document's position
         * in bulk operation. If the document had an ID prior to upserting (i.e. the
         * server did not need to generate an ID), this will contain its "_id". Any
         * server-generated ID will be an MongoDB\BSON\ObjectID instance.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see BulkWriteResult::isAcknowledged()
         * @return mixed[]
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getUpsertedIds()
        {
        }

        /**
         * Return whether this update was acknowledged by the server.
         *
         * If the update was not acknowledged, other fields from the WriteResult
         * (e.g. matchedCount) will be undefined.
         *
         * @return boolean
         */
        public function isAcknowledged()
        {
        }
    }

    class Collection
    {
        /**
         * Constructs new Collection instance.
         *
         * This class provides methods for collection-specific operations, such as
         * CRUD (i.e. create, read, update, and delete) and index management.
         *
         * Supported options:
         *
         *  * readConcern (MongoDB\Driver\ReadConcern): The default read concern to
         *    use for collection operations. Defaults to the Manager's read concern.
         *
         *  * readPreference (MongoDB\Driver\ReadPreference): The default read
         *    preference to use for collection operations. Defaults to the Manager's
         *    read preference.
         *
         *  * typeMap (array): Default type map for cursors and BSON documents.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): The default write concern
         *    to use for collection operations. Defaults to the Manager's write
         *    concern.
         *
         * @param Manager $manager Manager instance from the driver
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array $options Collection options
         * @throws InvalidArgumentException
         */
        public function __construct(Manager $manager, $databaseName, $collectionName, array $options = [])
        {
        }

        /**
         * Return internal properties for debugging purposes.
         *
         * @see http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.debuginfo
         * @return array
         */
        public function __debugInfo()
        {
        }

        /**
         * Return the collection namespace (e.g. "db.collection").
         *
         * @see https://docs.mongodb.org/manual/faq/developers/#faq-dev-namespace
         * @return string
         */
        public function __toString()
        {
        }

        /**
         * Executes an aggregation framework pipeline on the collection.
         *
         * Note: this method's return value depends on the MongoDB server version
         * and the "useCursor" option. If "useCursor" is true, a Cursor will be
         * returned; otherwise, an ArrayIterator is returned, which wraps the
         * "result" array from the command response document.
         *
         * Note: BSON deserialization of inline aggregation results (i.e. not using
         * a command cursor) does not yet support a custom type map
         * (depends on: https://jira.mongodb.org/browse/PHPC-314).
         *
         * @see Aggregate::__construct() for supported options
         * @param array $pipeline List of pipeline operations
         * @param array $options Command options
         * @return Traversable
         */
        public function aggregate(array $pipeline, array $options = [])
        {
        }

        /**
         * Executes multiple write operations.
         *
         * @see BulkWrite::__construct() for supported options
         * @param array[] $operations List of write operations
         * @param array $options Command options
         * @return BulkWriteResult
         */
        public function bulkWrite(array $operations, array $options = [])
        {
        }

        /**
         * Gets the number of documents matching the filter.
         *
         * @see Count::__construct() for supported options
         * @param array|object $filter Query by which to filter documents
         * @param array $options Command options
         * @return integer
         */
        public function count($filter = [], array $options = [])
        {
        }

        /**
         * Create a single index for the collection.
         *
         * @see Collection::createIndexes()
         * @param array|object $key Document containing fields mapped to values,
         *                              which denote order or an index type
         * @param array $options Index options
         * @return string The name of the created index
         */
        public function createIndex($key, array $options = [])
        {
        }

        /**
         * Create one or more indexes for the collection.
         *
         * Each element in the $indexes array must have a "key" document, which
         * contains fields mapped to an order or type. Other options may follow.
         * For example:
         *
         *     $indexes = [
         *         // Create a unique index on the "username" field
         *         [ 'key' => [ 'username' => 1 ], 'unique' => true ],
         *         // Create a 2dsphere index on the "loc" field with a custom name
         *         [ 'key' => [ 'loc' => '2dsphere' ], 'name' => 'geo' ],
         *     ];
         *
         * If the "name" option is unspecified, a name will be generated from the
         * "key" document.
         *
         * @see http://docs.mongodb.org/manual/reference/command/createIndexes/
         * @see http://docs.mongodb.org/manual/reference/method/db.collection.createIndex/
         * @param array[] $indexes List of index specifications
         * @return string[] The names of the created indexes
         * @throws InvalidArgumentException if an index specification is invalid
         */
        public function createIndexes(array $indexes)
        {
        }

        /**
         * Deletes all documents matching the filter.
         *
         * @see DeleteMany::__construct() for supported options
         * @see http://docs.mongodb.org/manual/reference/command/delete/
         * @param array|object $filter Query by which to delete documents
         * @param array $options Command options
         * @return DeleteResult
         */
        public function deleteMany($filter, array $options = [])
        {
        }

        /**
         * Deletes at most one document matching the filter.
         *
         * @see DeleteOne::__construct() for supported options
         * @see http://docs.mongodb.org/manual/reference/command/delete/
         * @param array|object $filter Query by which to delete documents
         * @param array $options Command options
         * @return DeleteResult
         */
        public function deleteOne($filter, array $options = [])
        {
        }

        /**
         * Finds the distinct values for a specified field across the collection.
         *
         * @see Distinct::__construct() for supported options
         * @param string $fieldName Field for which to return distinct values
         * @param array|object $filter Query by which to filter documents
         * @param array $options Command options
         * @return mixed[]
         */
        public function distinct($fieldName, $filter = [], array $options = [])
        {
        }

        /**
         * Drop this collection.
         *
         * @see DropCollection::__construct() for supported options
         * @param array $options Additional options
         * @return array|object Command result document
         */
        public function drop(array $options = [])
        {
        }

        /**
         * Drop a single index in the collection.
         *
         * @see DropIndexes::__construct() for supported options
         * @param string $indexName Index name
         * @param array $options Additional options
         * @return array|object Command result document
         * @throws InvalidArgumentException if $indexName is an empty string or "*"
         */
        public function dropIndex($indexName, array $options = [])
        {
        }

        /**
         * Drop all indexes in the collection.
         *
         * @see DropIndexes::__construct() for supported options
         * @param array $options Additional options
         * @return array|object Command result document
         */
        public function dropIndexes(array $options = [])
        {
        }

        /**
         * Finds documents matching the query.
         *
         * @see Find::__construct() for supported options
         * @see http://docs.mongodb.org/manual/core/read-operations-introduction/
         * @param array|object $filter Query by which to filter documents
         * @param array $options Additional options
         * @return Cursor
         */
        public function find($filter = [], array $options = [])
        {
        }

        /**
         * Finds a single document matching the query.
         *
         * @see FindOne::__construct() for supported options
         * @see http://docs.mongodb.org/manual/core/read-operations-introduction/
         * @param array|object $filter Query by which to filter documents
         * @param array $options Additional options
         * @return array|object|null
         */
        public function findOne($filter = [], array $options = [])
        {
        }

        /**
         * Finds a single document and deletes it, returning the original.
         *
         * The document to return may be null if no document matched the filter.
         *
         * Note: BSON deserialization of the returned document does not yet support
         * a custom type map (depends on: https://jira.mongodb.org/browse/PHPC-314).
         *
         * @see FindOneAndDelete::__construct() for supported options
         * @see http://docs.mongodb.org/manual/reference/command/findAndModify/
         * @param array|object $filter Query by which to filter documents
         * @param array $options Command options
         * @return object|null
         */
        public function findOneAndDelete($filter, array $options = [])
        {
        }

        /**
         * Finds a single document and replaces it, returning either the original or
         * the replaced document.
         *
         * The document to return may be null if no document matched the filter. By
         * default, the original document is returned. Specify
         * FindOneAndReplace::RETURN_DOCUMENT_AFTER for the "returnDocument" option
         * to return the updated document.
         *
         * Note: BSON deserialization of the returned document does not yet support
         * a custom type map (depends on: https://jira.mongodb.org/browse/PHPC-314).
         *
         * @see FindOneAndReplace::__construct() for supported options
         * @see http://docs.mongodb.org/manual/reference/command/findAndModify/
         * @param array|object $filter Query by which to filter documents
         * @param array|object $replacement Replacement document
         * @param array $options Command options
         * @return object|null
         */
        public function findOneAndReplace($filter, $replacement, array $options = [])
        {
        }

        /**
         * Finds a single document and updates it, returning either the original or
         * the updated document.
         *
         * The document to return may be null if no document matched the filter. By
         * default, the original document is returned. Specify
         * FindOneAndUpdate::RETURN_DOCUMENT_AFTER for the "returnDocument" option
         * to return the updated document.
         *
         * Note: BSON deserialization of the returned document does not yet support
         * a custom type map (depends on: https://jira.mongodb.org/browse/PHPC-314).
         *
         * @see FindOneAndReplace::__construct() for supported options
         * @see http://docs.mongodb.org/manual/reference/command/findAndModify/
         * @param array|object $filter Query by which to filter documents
         * @param array|object $update Update to apply to the matched document
         * @param array $options Command options
         * @return object|null
         */
        public function findOneAndUpdate($filter, $update, array $options = [])
        {
        }

        /**
         * Return the collection name.
         *
         * @return string
         */
        public function getCollectionName()
        {
        }

        /**
         * Return the database name.
         *
         * @return string
         */
        public function getDatabaseName()
        {
        }

        /**
         * Return the collection namespace.
         *
         * @see https://docs.mongodb.org/manual/reference/glossary/#term-namespace
         * @return string
         */
        public function getNamespace()
        {
        }

        /**
         * Inserts multiple documents.
         *
         * @see InsertMany::__construct() for supported options
         * @see http://docs.mongodb.org/manual/reference/command/insert/
         * @param array[]|object[] $documents The documents to insert
         * @param array $options Command options
         * @return InsertManyResult
         */
        public function insertMany(array $documents, array $options = [])
        {
        }

        /**
         * Inserts one document.
         *
         * @see InsertOne::__construct() for supported options
         * @see http://docs.mongodb.org/manual/reference/command/insert/
         * @param array|object $document The document to insert
         * @param array $options Command options
         * @return InsertOneResult
         */
        public function insertOne($document, array $options = [])
        {
        }

        /**
         * Returns information for all indexes for the collection.
         *
         * @see ListIndexes::__construct() for supported options
         * @param array $options
         * @return IndexInfoIterator
         */
        public function listIndexes(array $options = [])
        {
        }

        /**
         * Replaces at most one document matching the filter.
         *
         * @see ReplaceOne::__construct() for supported options
         * @see http://docs.mongodb.org/manual/reference/command/update/
         * @param array|object $filter Query by which to filter documents
         * @param array|object $replacement Replacement document
         * @param array $options Command options
         * @return UpdateResult
         */
        public function replaceOne($filter, $replacement, array $options = [])
        {
        }

        /**
         * Updates all documents matching the filter.
         *
         * @see UpdateMany::__construct() for supported options
         * @see http://docs.mongodb.org/manual/reference/command/update/
         * @param array|object $filter Query by which to filter documents
         * @param array|object $update Update to apply to the matched documents
         * @param array $options Command options
         * @return UpdateResult
         */
        public function updateMany($filter, $update, array $options = [])
        {
        }

        /**
         * Updates at most one document matching the filter.
         *
         * @see UpdateOne::__construct() for supported options
         * @see http://docs.mongodb.org/manual/reference/command/update/
         * @param array|object $filter Query by which to filter documents
         * @param array|object $update Update to apply to the matched document
         * @param array $options Command options
         * @return UpdateResult
         */
        public function updateOne($filter, $update, array $options = [])
        {
        }

        /**
         * Get a clone of this collection with different options.
         *
         * @see Collection::__construct() for supported options
         * @param array $options Collection constructor options
         * @return Collection
         */
        public function withOptions(array $options = [])
        {
        }

    }

    class Database
    {
        /**
         * Constructs new Database instance.
         *
         * This class provides methods for database-specific operations and serves
         * as a gateway for accessing collections.
         *
         * Supported options:
         *
         *  * readConcern (MongoDB\Driver\ReadConcern): The default read concern to
         *    use for database operations and selected collections. Defaults to the
         *    Manager's read concern.
         *
         *  * readPreference (MongoDB\Driver\ReadPreference): The default read
         *    preference to use for database operations and selected collections.
         *    Defaults to the Manager's read preference.
         *
         *  * typeMap (array): Default type map for cursors and BSON documents.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): The default write concern
         *    to use for database operations and selected collections. Defaults to
         *    the Manager's write concern.
         *
         * @param Manager $manager Manager instance from the driver
         * @param string $databaseName Database name
         * @param array $options Database options
         * @throws InvalidArgumentException
         */
        public function __construct(Manager $manager, $databaseName, array $options = [])
        {
        }

        /**
         * Return internal properties for debugging purposes.
         *
         * @see http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.debuginfo
         * @return array
         */
        public function __debugInfo()
        {
        }

        /**
         * Select a collection within this database.
         *
         * Note: collections whose names contain special characters (e.g. ".") may
         * be selected with complex syntax (e.g. $database->{"system.profile"}) or
         * {@link selectCollection()}.
         *
         * @see http://php.net/oop5.overloading#object.get
         * @see http://php.net/types.string#language.types.string.parsing.complex
         * @param string $collectionName Name of the collection to select
         * @return Collection
         */
        public function __get($collectionName)
        {
        }

        /**
         * Return the database name.
         *
         * @return string
         */
        public function __toString()
        {
        }

        /**
         * Execute a command on this database.
         *
         * @see DatabaseCommand::__construct() for supported options
         * @param array|object $command Command document
         * @param array $options Options for command execution
         * @return Cursor
         * @throws InvalidArgumentException
         */
        public function command($command, array $options = [])
        {
        }

        /**
         * Create a new collection explicitly.
         *
         * @see CreateCollection::__construct() for supported options
         * @param string $collectionName
         * @param array $options
         * @return array|object Command result document
         */
        public function createCollection($collectionName, array $options = [])
        {
        }

        /**
         * Drop this database.
         *
         * @see DropDatabase::__construct() for supported options
         * @param array $options Additional options
         * @return array|object Command result document
         */
        public function drop(array $options = [])
        {
        }

        /**
         * Drop a collection within this database.
         *
         * @see DropCollection::__construct() for supported options
         * @param string $collectionName Collection name
         * @param array $options Additional options
         * @return array|object Command result document
         */
        public function dropCollection($collectionName, array $options = [])
        {
        }

        /**
         * Returns the database name.
         *
         * @return string
         */
        public function getDatabaseName()
        {
        }

        /**
         * Returns information for all collections in this database.
         *
         * @see ListCollections::__construct() for supported options
         * @param array $options
         * @return CollectionInfoIterator
         */
        public function listCollections(array $options = [])
        {
        }

        /**
         * Select a collection within this database.
         *
         * @see Collection::__construct() for supported options
         * @param string $collectionName Name of the collection to select
         * @param array $options Collection constructor options
         * @return Collection
         */
        public function selectCollection($collectionName, array $options = [])
        {
        }

        /**
         * Get a clone of this database with different options.
         *
         * @see Database::__construct() for supported options
         * @param array $options Database constructor options
         * @return Database
         */
        public function withOptions(array $options = [])
        {
        }
    }

    /**
     * Result class for a delete operation.
     */
    class DeleteResult
    {
        /**
         * Constructor.
         *
         * @param WriteResult $writeResult
         */
        public function __construct(WriteResult $writeResult)
        {
        }

        /**
         * Return the number of documents that were deleted.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see DeleteResult::isAcknowledged()
         * @return integer
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getDeletedCount()
        {
        }

        /**
         * Return whether this delete was acknowledged by the server.
         *
         * If the delete was not acknowledged, other fields from the WriteResult
         * (e.g. deletedCount) will be undefined.
         *
         * @return boolean
         */
        public function isAcknowledged()
        {
        }
    }

    /**
     * Result class for a multi-document insert operation.
     */
    class InsertManyResult
    {
        /**
         * Constructor.
         *
         * @param WriteResult $writeResult
         * @param mixed[] $insertedIds
         */
        public function __construct(WriteResult $writeResult, array $insertedIds)
        {
        }

        /**
         * Return the number of documents that were inserted.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see InsertManyResult::isAcknowledged()
         * @return integer
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getInsertedCount()
        {
        }

        /**
         * Return a map of the inserted documents' IDs.
         *
         * The index of each ID in the map corresponds to the document's position in
         * the bulk operation. If the document had an ID prior to insertion (i.e.
         * the driver did not generate an ID), this will contain its "_id" field
         * value. Any driver-generated ID will be an MongoDB\BSON\ObjectID instance.
         *
         * @return mixed[]
         */
        public function getInsertedIds()
        {
        }

        /**
         * Return whether this insert result was acknowledged by the server.
         *
         * If the insert was not acknowledged, other fields from the WriteResult
         * (e.g. insertedCount) will be undefined.
         *
         * @return boolean
         */
        public function isAcknowledged()
        {
        }
    }

    /**
     * Result class for a single-document insert operation.
     */
    class InsertOneResult
    {
        /**
         * Constructor.
         *
         * @param WriteResult $writeResult
         * @param mixed $insertedId
         */
        public function __construct(WriteResult $writeResult, $insertedId)
        {
        }

        /**
         * Return the number of documents that were inserted.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see InsertOneResult::isAcknowledged()
         * @return integer
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getInsertedCount()
        {
        }

        /**
         * Return the inserted document's ID.
         *
         * If the document already an ID prior to insertion (i.e. the driver did not
         * need to generate an ID), this will contain its "_id". Any
         * driver-generated ID will be an MongoDB\BSON\ObjectID instance.
         *
         * @return mixed
         */
        public function getInsertedId()
        {
        }

        /**
         * Return whether this insert was acknowledged by the server.
         *
         * If the insert was not acknowledged, other fields from the WriteResult
         * (e.g. insertedCount) will be undefined.
         *
         * If the insert was not acknowledged, other fields from the WriteResult
         * (e.g. insertedCount) will be undefined and their getter methods should
         * not be invoked.
         *
         * @return boolean
         */
        public function isAcknowledged()
        {
        }
    }

    /**
     * Result class for an update operation.
     */
    class UpdateResult
    {
        /**
         * Constructor.
         *
         * @param WriteResult $writeResult
         */
        public function __construct(WriteResult $writeResult)
        {
        }

        /**
         * Return the number of documents that were matched by the filter.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see UpdateResult::isAcknowledged()
         * @return integer
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getMatchedCount()
        {
        }

        /**
         * Return the number of documents that were modified.
         *
         * This value is undefined (i.e. null) if the write executed as a legacy
         * operation instead of command.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see UpdateResult::isAcknowledged()
         * @return integer|null
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getModifiedCount()
        {
        }

        /**
         * Return the number of documents that were upserted.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see UpdateResult::isAcknowledged()
         * @return integer
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getUpsertedCount()
        {
        }

        /**
         * Return the ID of the document inserted by an upsert operation.
         *
         * This value is undefined (i.e. null) if an upsert did not take place.
         *
         * This method should only be called if the write was acknowledged.
         *
         * @see UpdateResult::isAcknowledged()
         * @return mixed|null
         * @throws BadMethodCallException is the write result is unacknowledged
         */
        public function getUpsertedId()
        {
        }

        /**
         * Return whether this update was acknowledged by the server.
         *
         * If the update was not acknowledged, other fields from the WriteResult
         * (e.g. matchedCount) will be undefined and their getter methods should not
         * be invoked.
         *
         * @return boolean
         */
        public function isAcknowledged()
        {
        }
    }
}

namespace MongoDB\Model
{

    use ArrayObject;
    use ArrayAccess;
    use Iterator;
    use JsonSerializable;
    use MongoDB\BSON\Serializable;
    use MongoDB\BSON\Unserializable;
    use MongoDB\Exception\BadMethodCallException;

    /**
     * Model class for a BSON array.
     *
     * The internal data will be filtered through array_values() during BSON
     * serialization to ensure that it becomes a BSON array.
     *
     * @api
     */
    class BSONArray extends ArrayObject implements JsonSerializable, Serializable, Unserializable
    {
        /**
         * Factory method for var_export().
         *
         * @see http://php.net/oop5.magic#object.set-state
         * @see http://php.net/var-export
         * @param array $properties
         * @return self
         */
        public static function __set_state(array $properties)
        {
        }

        /**
         * Serialize the array to BSON.
         *
         * The array data will be numerically reindexed to ensure that it is stored
         * as a BSON array.
         *
         * @see http://php.net/mongodb-bson-serializable.bsonserialize
         * @return array
         */
        public function bsonSerialize()
        {
        }

        /**
         * Unserialize the document to BSON.
         *
         * @see http://php.net/mongodb-bson-unserializable.bsonunserialize
         * @param array $data
         */
        public function bsonUnserialize($data)
        {
        }

        /**
         * Serialize the array to JSON.
         *
         * The array data will be numerically reindexed to ensure that it is stored
         * as a JSON array.
         *
         * @see http://php.net/jsonserializable.jsonserialize
         * @return array
         */
        public function jsonSerialize()
        {
        }
    }

    /**
     * Model class for a BSON document.
     *
     * The internal data will be cast to an object during BSON serialization to
     * ensure that it becomes a BSON document.
     *
     * @api
     */
    class BSONDocument extends ArrayObject implements JsonSerializable, Serializable, Unserializable
    {
        /**
         * Constructor.
         *
         * This overrides the parent constructor to allow property access of entries
         * by default.
         *
         * @see http://php.net/arrayobject.construct
         *
         * @param array $input
         * @param int $flags
         * @param string $iterator_class
         */
        public function __construct($input = [], $flags = ArrayObject::ARRAY_AS_PROPS, $iterator_class = 'ArrayIterator')
        {
        }

        /**
         * Factory method for var_export().
         *
         * @see http://php.net/oop5.magic#object.set-state
         * @see http://php.net/var-export
         * @param array $properties
         * @return self
         */
        public static function __set_state(array $properties)
        {
        }

        /**
         * Serialize the document to BSON.
         *
         * @see http://php.net/mongodb-bson-serializable.bsonserialize
         * @return object
         */
        public function bsonSerialize()
        {
        }

        /**
         * Unserialize the document to BSON.
         *
         * @see http://php.net/mongodb-bson-unserializable.bsonunserialize
         * @param array $data Array data
         */
        public function bsonUnserialize($data)
        {
        }

        /**
         * Serialize the array to JSON.
         *
         * @see http://php.net/jsonserializable.jsonserialize
         * @return object
         */
        public function jsonSerialize()
        {
        }
    }

    /**
     * Collection information model class.
     *
     * This class models the collection information returned by the listCollections
     * command or, for legacy servers, queries on the "system.namespaces"
     * collection. It provides methods to access options for the collection.
     *
     * @api
     * @see MongoDB\Database::listCollections()
     * @see https://github.com/mongodb/specifications/blob/master/source/enumerate-collections.rst
     */
    class CollectionInfo
    {
        /**
         * Constructor.
         *
         * @param array $info Collection info
         */
        public function __construct(array $info)
        {
        }

        /**
         * Return the collection info as an array.
         *
         * @see http://php.net/oop5.magic#language.oop5.magic.debuginfo
         * @return array
         */
        public function __debugInfo()
        {
        }

        /**
         * Return the maximum number of documents to keep in the capped collection.
         *
         * @return integer|null
         */
        public function getCappedMax()
        {
        }

        /**
         * Return the maximum size (in bytes) of the capped collection.
         *
         * @return integer|null
         */
        public function getCappedSize()
        {
        }

        /**
         * Return the collection name.
         *
         * @return string
         */
        public function getName()
        {
        }

        /**
         * Return the collection options.
         *
         * @return array
         */
        public function getOptions()
        {
        }

        /**
         * Return whether the collection is a capped collection.
         *
         * @return boolean
         */
        public function isCapped()
        {
        }
    }

    /**
     * Database information model class.
     *
     * This class models the database information returned by the listDatabases
     * command. It provides methods to access common database properties.
     *
     * @api
     * @see MongoDB\Client::listDatabases()
     * @see http://docs.mongodb.org/manual/reference/command/listDatabases/
     */
    class DatabaseInfo
    {
        /**
         * Constructor.
         *
         * @param array $info Database info
         */
        public function __construct(array $info)
        {
        }

        /**
         * Return the collection info as an array.
         *
         * @see http://php.net/oop5.magic#language.oop5.magic.debuginfo
         * @return array
         */
        public function __debugInfo()
        {
        }

        /**
         * Return the database name.
         *
         * @return string
         */
        public function getName()
        {
        }

        /**
         * Return the databases size on disk (in bytes).
         *
         * @return integer
         */
        public function getSizeOnDisk()
        {
        }

        /**
         * Return whether the database is empty.
         *
         * @return boolean
         */
        public function isEmpty()
        {
        }
    }


    /**
     * Index information model class.
     *
     * This class models the index information returned by the listIndexes command
     * or, for legacy servers, queries on the "system.indexes" collection. It
     * provides methods to access common index options, and allows access to other
     * options through the ArrayAccess interface (write methods are not supported).
     * For information on keys and index options, see the referenced
     * db.collection.createIndex() documentation.
     *
     * @api
     * @see MongoDB\Collection::listIndexes()
     * @see https://github.com/mongodb/specifications/blob/master/source/enumerate-indexes.rst
     * @see http://docs.mongodb.org/manual/reference/method/db.collection.createIndex/
     */
    class IndexInfo implements ArrayAccess
    {
        /**
         * Constructor.
         *
         * @param array $info Index info
         */
        public function __construct(array $info)
        {
        }

        /**
         * Return the collection info as an array.
         *
         * @see http://php.net/oop5.magic#language.oop5.magic.debuginfo
         * @return array
         */
        public function __debugInfo()
        {
        }

        /**
         * Return the index key.
         *
         * @return array
         */
        public function getKey()
        {
        }

        /**
         * Return the index name.
         *
         * @return string
         */
        public function getName()
        {
        }

        /**
         * Return the index namespace (e.g. "db.collection").
         *
         * @return string
         */
        public function getNamespace()
        {
        }

        /**
         * Return the index version.
         *
         * @return integer
         */
        public function getVersion()
        {
        }

        /**
         * Return whether this is a sparse index.
         *
         * @see http://docs.mongodb.org/manual/core/index-sparse/
         * @return boolean
         */
        public function isSparse()
        {
        }

        /**
         * Return whether this is a TTL index.
         *
         * @see http://docs.mongodb.org/manual/core/index-ttl/
         * @return boolean
         */
        public function isTtl()
        {
        }

        /**
         * Return whether this is a unique index.
         *
         * @see http://docs.mongodb.org/manual/core/index-unique/
         * @return boolean
         */
        public function isUnique()
        {
        }

        /**
         * Check whether a field exists in the index information.
         *
         * @see http://php.net/arrayaccess.offsetexists
         * @param mixed $key
         * @return boolean
         */
        public function offsetExists($key)
        {
        }

        /**
         * Return the field's value from the index information.
         *
         * This method satisfies the Enumerating Indexes specification's requirement
         * that index fields be made accessible under their original names. It may
         * also be used to access fields that do not have a helper method.
         *
         * @see http://php.net/arrayaccess.offsetget
         * @see https://github.com/mongodb/specifications/blob/master/source/enumerate-indexes.rst#getting-full-index-information
         * @param mixed $key
         * @return mixed
         */
        public function offsetGet($key)
        {
        }

        /**
         * Not supported.
         *
         * @see http://php.net/arrayaccess.offsetset
         * @throws BadMethodCallException
         * @param mixed $key
         * @param mixed $value
         */
        public function offsetSet($key, $value)
        {
        }

        /**
         * Not supported.
         *
         * @see http://php.net/arrayaccess.offsetunset
         * @throws BadMethodCallException
         * @param mixed $key
         */
        public function offsetUnset($key)
        {
        }
    }

    /**
     * CollectionInfoIterator interface.
     *
     * This iterator is used for enumerating collections in a database.
     *
     * @api
     * @see MongoDB\Database::listCollections()
     */
    interface CollectionInfoIterator extends Iterator
    {
        /**
         * Return the current element as a CollectionInfo instance.
         *
         * @return CollectionInfo
         */
        public function current();
    }

    /**
     * DatabaseInfoIterator interface.
     *
     * This iterator is used for enumerating databases on a server.
     *
     * @api
     * @see MongoDB\Client::listDatabases()
     */
    interface DatabaseInfoIterator extends Iterator
    {
        /**
         * Return the current element as a DatabaseInfo instance.
         *
         * @return DatabaseInfo
         */
        public function current();
    }

    /**
     * IndexInfoIterator interface.
     *
     * This iterator is used for enumerating indexes in a collection.
     *
     * @api
     * @see MongoDB\Collection::listIndexes()
     */
    interface IndexInfoIterator extends Iterator
    {
        /**
         * Return the current element as a IndexInfo instance.
         *
         * @return IndexInfo
         */
        public function current();
    }
}

namespace MongoDB\GridFS
{

    use MongoDB\BSON\ObjectId;
    use MongoDB\Driver\Cursor;
    use MongoDB\Driver\Manager;
    use MongoDB\Exception\InvalidArgumentException;
    use MongoDB\GridFS\Exception\FileNotFoundException;

    /**
     * Bucket provides a public API for interacting with the GridFS files and chunks
     * collections.
     *
     * @api
     */
    class Bucket
    {
        /**
         * Constructs a GridFS bucket.
         *
         * Supported options:
         *
         *  * bucketName (string): The bucket name, which will be used as a prefix
         *    for the files and chunks collections. Defaults to "fs".
         *
         *  * chunkSizeBytes (integer): The chunk size in bytes. Defaults to
         *    261120 (i.e. 255 KiB).
         *
         *  * readConcern (MongoDB\Driver\ReadConcern): Read concern.
         *
         *  * readPreference (MongoDB\Driver\ReadPreference): Read preference.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern.
         *
         * @param Manager $manager Manager instance from the driver
         * @param string $databaseName Database name
         * @param array $options Bucket options
         * @throws InvalidArgumentException
         */
        public function __construct(Manager $manager, $databaseName, array $options = [])
        {
        }

        /**
         * Delete a file from the GridFS bucket.
         *
         * If the files collection document is not found, this method will still
         * attempt to delete orphaned chunks.
         *
         * @param mixed $id File ID
         * @throws FileNotFoundException
         */
        public function delete($id)
        {
        }

        /**
         * Writes the contents of a GridFS file to a writable stream.
         *
         * @param mixed $id File ID
         * @param resource $destination Writable Stream
         * @throws FileNotFoundException
         * @throws InvalidArgumentException if $destination is not a stream
         */
        public function downloadToStream($id, $destination)
        {
        }

        /**
         * Writes the contents of a GridFS file, which is selected by name and
         * revision, to a writable stream.
         *
         * Supported options:
         *
         *  * revision (integer): Which revision (i.e. documents with the same
         *    filename and different uploadDate) of the file to retrieve. Defaults
         *    to -1 (i.e. the most recent revision).
         *
         * Revision numbers are defined as follows:
         *
         *  * 0 = the original stored file
         *  * 1 = the first revision
         *  * 2 = the second revision
         *  * etc…
         *  * -2 = the second most recent revision
         *  * -1 = the most recent revision
         *
         * @param string $filename Filename
         * @param resource $destination Writable Stream
         * @param array $options Download options
         * @throws FileNotFoundException
         * @throws InvalidArgumentException if $destination is not a stream
         */
        public function downloadToStreamByName($filename, $destination, array $options = [])
        {
        }

        /**
         * Drops the files and chunks collections associated with this GridFS
         * bucket.
         */
        public function drop()
        {
        }

        /**
         * Finds documents from the GridFS bucket's files collection matching the
         * query.
         *
         * @see Find::__construct() for supported options
         * @param array|object $filter Query by which to filter documents
         * @param array $options Additional options
         * @return Cursor
         */
        public function find($filter, array $options = [])
        {
        }

        public function getCollectionWrapper()
        {
        }

        public function getDatabaseName()
        {
        }

        /**
         * Gets the ID of the GridFS file associated with a stream.
         *
         * @param resource $stream GridFS stream
         * @return mixed
         */
        public function getIdFromStream($stream)
        {
        }

        /**
         * Opens a readable stream for reading a GridFS file.
         *
         * @param mixed $id File ID
         * @return resource
         * @throws FileNotFoundException
         */
        public function openDownloadStream($id)
        {
        }

        /**
         * Opens a readable stream stream to read a GridFS file, which is selected
         * by name and revision.
         *
         * Supported options:
         *
         *  * revision (integer): Which revision (i.e. documents with the same
         *    filename and different uploadDate) of the file to retrieve. Defaults
         *    to -1 (i.e. the most recent revision).
         *
         * Revision numbers are defined as follows:
         *
         *  * 0 = the original stored file
         *  * 1 = the first revision
         *  * 2 = the second revision
         *  * etc…
         *  * -2 = the second most recent revision
         *  * -1 = the most recent revision
         *
         * @param string $filename Filename
         * @param array $options Download options
         * @return resource
         * @throws FileNotFoundException
         */
        public function openDownloadStreamByName($filename, array $options = [])
        {
        }

        /**
         * Opens a writable stream for writing a GridFS file.
         *
         * Supported options:
         *
         *  * _id (mixed): File document identifier. Defaults to a new ObjectId.
         *
         *  * chunkSizeBytes (integer): The chunk size in bytes. Defaults to the
         *    bucket's chunk size.
         *
         *  * metadata (document): User data for the "metadata" field of the files
         *    collection document.
         *
         * @param string $filename Filename
         * @param array $options Upload options
         * @return resource
         */
        public function openUploadStream($filename, array $options = [])
        {
        }

        /**
         * Renames the GridFS file with the specified ID.
         *
         * @param mixed $id File ID
         * @param string $newFilename New filename
         * @throws FileNotFoundException
         */
        public function rename($id, $newFilename)
        {
        }

        /**
         * Writes the contents of a readable stream to a GridFS file.
         *
         * Supported options:
         *
         *  * _id (mixed): File document identifier. Defaults to a new ObjectId.
         *
         *  * chunkSizeBytes (integer): The chunk size in bytes. Defaults to the
         *    bucket's chunk size.
         *
         *  * metadata (document): User data for the "metadata" field of the files
         *    collection document.
         *
         * @param string $filename Filename
         * @param resource $source Readable stream
         * @param array $options Stream options
         * @return ObjectId ID of the newly created GridFS file
         * @throws InvalidArgumentException if $source is not a stream
         */
        public function uploadFromStream($filename, $source, array $options = [])
        {
        }

    }
}
namespace MongoDB\GridFS\Exception
{

    use MongoDB\Exception\RuntimeException;

    class CorruptFileException extends RuntimeException
    {
        /**
         * Thrown when a chunk is not found for an expected index.
         *
         * @param integer $expectedIndex Expected index number
         * @return self
         */
        public static function missingChunk($expectedIndex)
        {
        }

        /**
         * Thrown when a chunk has an unexpected index number.
         *
         * @param integer $index Actual index number (i.e. "n" field)
         * @param integer $expectedIndex Expected index number
         * @return self
         */
        public static function unexpectedIndex($index, $expectedIndex)
        {
        }

        /**
         * Thrown when a chunk has an unexpected data size.
         *
         * @param integer $size Actual size (i.e. "data" field length)
         * @param integer $expectedSize Expected size
         * @return self
         */
        public static function unexpectedSize($size, $expectedSize)
        {
        }
    }

    class FileNotFoundException extends RuntimeException
    {
        /**
         * Thrown when a file cannot be found by its filename and revision.
         *
         * @param string $filename Filename
         * @param integer $revision Revision
         * @param string $namespace Namespace for the files collection
         * @return self
         */
        public static function byFilenameAndRevision($filename, $revision, $namespace)
        {
        }

        /**
         * Thrown when a file cannot be found by its ID.
         *
         * @param mixed $id File ID
         * @param string $namespace Namespace for the files collection
         * @return self
         */
        public static function byId($id, $namespace)
        {
        }
    }
}

namespace MongoDB\Operation
{

    use MongoDB\BulkWriteResult;
    use MongoDB\Driver\Server;
    use MongoDB\Exception\InvalidArgumentException;
    use MongoDB\Exception\UnexpectedValueException;
    use Traversable;
    use MongoDB\Driver\Cursor;
    use MongoDB\DeleteResult;
    use MongoDB\InsertManyResult;
    use MongoDB\InsertOneResult;
    use MongoDB\Model\CollectionInfoIterator;
    use MongoDB\Model\DatabaseInfoIterator;
    use MongoDB\Model\IndexInfoIterator;
    use MongoDB\UpdateResult;

    interface Executable
    {
    }

    /**
     * Operation for the aggregate command.
     *
     * @api
     * @see MongoDB\Collection::aggregate()
     * @see http://docs.mongodb.org/manual/reference/command/aggregate/
     */
    class Aggregate implements Executable
    {
        /**
         * Constructs an aggregate command.
         *
         * Supported options:
         *
         *  * allowDiskUse (boolean): Enables writing to temporary files. When set
         *    to true, aggregation stages can write data to the _tmp sub-directory
         *    in the dbPath directory. The default is false.
         *
         *  * batchSize (integer): The number of documents to return per batch.
         *
         *  * bypassDocumentValidation (boolean): If true, allows the write to opt
         *    out of document level validation. This only applies when the $out
         *    stage is specified.
         *
         *    For servers < 3.2, this option is ignored as document level validation
         *    is not available.
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run.
         *
         *  * readConcern (MongoDB\Driver\ReadConcern): Read concern. Note that a
         *    "majority" read concern is not compatible with the $out stage.
         *
         *    For servers < 3.2, this option is ignored as read concern is not
         *    available.
         *
         *  * readPreference (MongoDB\Driver\ReadPreference): Read preference.
         *
         *  * typeMap (array): Type map for BSON deserialization. This will be
         *    applied to the returned Cursor (it is not sent to the server).
         *
         *    This is not supported for inline aggregation results (i.e. useCursor
         *    option is false or the server versions < 2.6).
         *
         *  * useCursor (boolean): Indicates whether the command will request that
         *    the server provide results using a cursor. The default is true.
         *
         *    For servers < 2.6, this option is ignored as aggregation cursors are
         *    not available.
         *
         *    For servers >= 2.6, this option allows users to turn off cursors if
         *    necessary to aid in mongod/mongos upgrades.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array $pipeline List of pipeline operations
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, array $pipeline, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return Traversable
         * @throws UnexpectedValueException if the command response was malformed
         */
        public function execute(Server $server)
        {
        }


    }

    /**
     * Operation for executing multiple write operations.
     *
     * @api
     * @see MongoDB\Collection::bulkWrite()
     */
    class BulkWrite implements Executable
    {
        const DELETE_MANY = 'deleteMany';
        const DELETE_ONE = 'deleteOne';
        const INSERT_ONE = 'insertOne';
        const REPLACE_ONE = 'replaceOne';
        const UPDATE_MANY = 'updateMany';
        const UPDATE_ONE = 'updateOne';

        /**
         * Constructs a bulk write operation.
         *
         * Example array structure for all supported operation types:
         *
         *  [
         *    [ 'deleteMany' => [ $filter ] ],
         *    [ 'deleteOne'  => [ $filter ] ],
         *    [ 'insertOne'  => [ $document ] ],
         *    [ 'replaceOne' => [ $filter, $replacement, $options ] ],
         *    [ 'updateMany' => [ $filter, $update, $options ] ],
         *    [ 'updateOne'  => [ $filter, $update, $options ] ],
         *  ]
         *
         * Arguments correspond to the respective Operation classes; however, the
         * writeConcern option is specified for the top-level bulk write operation
         * instead of each individual operation.
         *
         * Supported options for replaceOne, updateMany, and updateOne operations:
         *
         *  * upsert (boolean): When true, a new document is created if no document
         *    matches the query. The default is false.
         *
         * Supported options for the bulk write operation:
         *
         *  * bypassDocumentValidation (boolean): If true, allows the write to opt
         *    out of document level validation.
         *
         *  * ordered (boolean): If true, when an insert fails, return without
         *    performing the remaining writes. If false, when a write fails,
         *    continue with the remaining writes, if any. The default is true.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array[] $operations List of write operations
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, array $operations, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return BulkWriteResult
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for the count command.
     *
     * @api
     * @see MongoDB\Collection::count()
     * @see http://docs.mongodb.org/manual/reference/command/count/
     */
    class Count implements Executable
    {
        /**
         * Constructs a count command.
         *
         * Supported options:
         *
         *  * hint (string|document): The index to use. If a document, it will be
         *    interpretted as an index specification and a name will be generated.
         *
         *  * limit (integer): The maximum number of documents to count.
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run.
         *
         *  * readConcern (MongoDB\Driver\ReadConcern): Read concern.
         *
         *    For servers < 3.2, this option is ignored as read concern is not
         *    available.
         *
         *  * readPreference (MongoDB\Driver\ReadPreference): Read preference.
         *
         *  * skip (integer): The number of documents to skip before returning the
         *    documents.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $filter Query by which to filter documents
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $filter = [], array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return integer
         * @throws UnexpectedValueException if the command response was malformed
         */
        public function execute(Server $server)
        {
        }

    }

    /**
     * Operation for the create command.
     *
     * @api
     * @see MongoDB\Database::createCollection()
     * @see http://docs.mongodb.org/manual/reference/command/create/
     */
    class CreateCollection implements Executable
    {
        const USE_POWER_OF_2_SIZES = 1;
        const NO_PADDING = 2;

        /**
         * Constructs a create command.
         *
         * Supported options:
         *
         *  * autoIndexId (boolean): Specify false to disable the automatic creation
         *    of an index on the _id field. For replica sets, this option cannot be
         *    false. The default is true.
         *
         *  * capped (boolean): Specify true to create a capped collection. If set,
         *    the size option must also be specified. The default is false.
         *
         *  * flags (integer): Options for the MMAPv1 storage engine only. Must be a
         *    bitwise combination CreateCollection::USE_POWER_OF_2_SIZES and
         *    CreateCollection::NO_PADDING. The default is
         *    CreateCollection::USE_POWER_OF_2_SIZES.
         *
         *  * indexOptionDefaults (document): Default configuration for indexes when
         *    creating the collection.
         *
         *  * max (integer): The maximum number of documents allowed in the capped
         *    collection. The size option takes precedence over this limit.
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run.
         *
         *  * size (integer): The maximum number of bytes for a capped collection.
         *
         *  * storageEngine (document): Storage engine options.
         *
         *  * typeMap (array): Type map for BSON deserialization. This will only be
         *    used for the returned command result document.
         *
         *  * validationAction (string): Validation action.
         *
         *  * validationLevel (string): Validation level.
         *
         *  * validator (document): Validation rules or expressions.
         *
         * @see http://source.wiredtiger.com/2.4.1/struct_w_t___s_e_s_s_i_o_n.html#a358ca4141d59c345f401c58501276bbb
         * @see https://docs.mongodb.org/manual/core/document-validation/
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return array|object Command result document
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for the createIndexes command.
     *
     * @api
     * @see MongoDB\Collection::createIndex()
     * @see MongoDB\Collection::createIndexes()
     * @see http://docs.mongodb.org/manual/reference/command/createIndexes/
     */
    class CreateIndexes implements Executable
    {
        /**
         * Constructs a createIndexes command.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array[] $indexes List of index specifications
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, array $indexes)
        {
        }

        /**
         * Execute the operation.
         *
         * For servers < 2.6, this will actually perform an insert operation on the
         * database's "system.indexes" collection.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return string[] The names of the created indexes
         */
        public function execute(Server $server)
        {
        }

    }

    /**
     * Operation for executing a database command.
     *
     * @api
     * @see MongoDB\Database::command()
     */
    class DatabaseCommand implements Executable
    {
        /**
         * Constructs a command.
         *
         * Supported options:
         *
         *  * readPreference (MongoDB\Driver\ReadPreference): The read preference to
         *    use when executing the command. This may be used when issuing the
         *    command to a replica set or mongos node to ensure that the driver sets
         *    the wire protocol accordingly or adds the read preference to the
         *    command document, respectively.
         *
         *  * typeMap (array): Type map for BSON deserialization. This will be
         *    applied to the returned Cursor (it is not sent to the server).
         *
         * @param string $databaseName Database name
         * @param array|object $command Command document
         * @param array $options Options for command execution
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $command, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return Cursor
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for deleting multiple document with the delete command.
     *
     * @api
     * @see MongoDB\Collection::deleteOne()
     * @see http://docs.mongodb.org/manual/reference/command/delete/
     */
    class DeleteMany implements Executable
    {
        /**
         * Constructs a delete command.
         *
         * Supported options:
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $filter Query by which to delete documents
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $filter, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return DeleteResult
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for deleting a single document with the delete command.
     *
     * @api
     * @see MongoDB\Collection::deleteOne()
     * @see http://docs.mongodb.org/manual/reference/command/delete/
     */
    class DeleteOne implements Executable
    {
        /**
         * Constructs a delete command.
         *
         * Supported options:
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $filter Query by which to delete documents
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $filter, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return DeleteResult
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for the distinct command.
     *
     * @api
     * @see MongoDB\Collection::distinct()
     * @see http://docs.mongodb.org/manual/reference/command/distinct/
     */
    class Distinct implements Executable
    {
        /**
         * Constructs a distinct command.
         *
         * Supported options:
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run.
         *
         *  * readConcern (MongoDB\Driver\ReadConcern): Read concern.
         *
         *    For servers < 3.2, this option is ignored as read concern is not
         *    available.
         *
         *  * readPreference (MongoDB\Driver\ReadPreference): Read preference.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param string $fieldName Field for which to return distinct values
         * @param array|object $filter Query by which to filter documents
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $fieldName, $filter = [], array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return mixed[]
         * @throws UnexpectedValueException if the command response was malformed
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for the drop command.
     *
     * @api
     * @see MongoDB\Collection::drop()
     * @see MongoDB\Database::dropCollection()
     * @see http://docs.mongodb.org/manual/reference/command/drop/
     */
    class DropCollection implements Executable
    {
        /**
         * Constructs a drop command.
         *
         * Supported options:
         *
         *  * typeMap (array): Type map for BSON deserialization. This will be used
         *    for the returned command result document.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array $options Command options
         */
        public function __construct($databaseName, $collectionName, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return array|object Command result document
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for the dropDatabase command.
     *
     * @api
     * @see MongoDB\Client::dropDatabase()
     * @see MongoDB\Database::drop()
     * @see http://docs.mongodb.org/manual/reference/command/dropDatabase/
     */
    class DropDatabase implements Executable
    {
        /**
         * Constructs a dropDatabase command.
         *
         * Supported options:
         *
         *  * typeMap (array): Type map for BSON deserialization. This will be used
         *    for the returned command result document.
         *
         * @param string $databaseName Database name
         * @param array $options Command options
         */
        public function __construct($databaseName, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return array|object Command result document
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for the dropIndexes command.
     *
     * @api
     * @see MongoDB\Collection::dropIndexes()
     * @see http://docs.mongodb.org/manual/reference/command/dropIndexes/
     */
    class DropIndexes implements Executable
    {
        /**
         * Constructs a dropIndexes command.
         *
         * Supported options:
         *
         *  * typeMap (array): Type map for BSON deserialization. This will be used
         *    for the returned command result document.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param string $indexName Index name (use "*" to drop all indexes)
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $indexName, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return array|object Command result document
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for the find command.
     *
     * @api
     * @see MongoDB\Collection::find()
     * @see http://docs.mongodb.org/manual/tutorial/query-documents/
     * @see http://docs.mongodb.org/manual/reference/operator/query-modifier/
     */
    class Find implements Executable
    {
        const NON_TAILABLE = 1;
        const TAILABLE = 2;
        const TAILABLE_AWAIT = 3;

        /**
         * Constructs a find command.
         *
         * Supported options:
         *
         *  * allowPartialResults (boolean): Get partial results from a mongos if
         *    some shards are inaccessible (instead of throwing an error).
         *
         *  * batchSize (integer): The number of documents to return per batch.
         *
         *  * comment (string): Attaches a comment to the query. If "$comment" also
         *    exists in the modifiers document, this option will take precedence.
         *
         *  * cursorType (enum): Indicates the type of cursor to use. Must be either
         *    NON_TAILABLE, TAILABLE, or TAILABLE_AWAIT. The default is
         *    NON_TAILABLE.
         *
         *  * limit (integer): The maximum number of documents to return.
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run. If "$maxTimeMS" also exists in the modifiers document, this
         *    option will take precedence.
         *
         *  * modifiers (document): Meta-operators modifying the output or behavior
         *    of a query.
         *
         *  * noCursorTimeout (boolean): The server normally times out idle cursors
         *    after an inactivity period (10 minutes) to prevent excess memory use.
         *    Set this option to prevent that.
         *
         *  * oplogReplay (boolean): Internal replication use only. The driver
         *    should not set this.
         *
         *  * projection (document): Limits the fields to return for the matching
         *    document.
         *
         *  * readConcern (MongoDB\Driver\ReadConcern): Read concern.
         *
         *    For servers < 3.2, this option is ignored as read concern is not
         *    available.
         *
         *  * readPreference (MongoDB\Driver\ReadPreference): Read preference.
         *
         *  * skip (integer): The number of documents to skip before returning.
         *
         *  * sort (document): The order in which to return matching documents. If
         *    "$orderby" also exists in the modifiers document, this option will
         *    take precedence.
         *
         *  * typeMap (array): Type map for BSON deserialization. This will be
         *    applied to the returned Cursor (it is not sent to the server).
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $filter Query by which to filter documents
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $filter, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return Cursor
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for finding a single document with the find command.
     *
     * @api
     * @see MongoDB\Collection::findOne()
     * @see http://docs.mongodb.org/manual/tutorial/query-documents/
     * @see http://docs.mongodb.org/manual/reference/operator/query-modifier/
     */
    class FindOne implements Executable
    {
        /**
         * Constructs a find command for finding a single document.
         *
         * Supported options:
         *
         *  * comment (string): Attaches a comment to the query. If "$comment" also
         *    exists in the modifiers document, this option will take precedence.
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run. If "$maxTimeMS" also exists in the modifiers document, this
         *    option will take precedence.
         *
         *  * modifiers (document): Meta-operators modifying the output or behavior
         *    of a query.
         *
         *  * projection (document): Limits the fields to return for the matching
         *    document.
         *
         *  * readConcern (MongoDB\Driver\ReadConcern): Read concern.
         *
         *    For servers < 3.2, this option is ignored as read concern is not
         *    available.
         *
         *  * readPreference (MongoDB\Driver\ReadPreference): Read preference.
         *
         *  * skip (integer): The number of documents to skip before returning.
         *
         *  * sort (document): The order in which to return matching documents. If
         *    "$orderby" also exists in the modifiers document, this option will
         *    take precedence.
         *
         *  * typeMap (array): Type map for BSON deserialization.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $filter Query by which to filter documents
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $filter, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return array|object|null
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for deleting a document with the findAndModify command.
     *
     * @api
     * @see MongoDB\Collection::findOneAndDelete()
     * @see http://docs.mongodb.org/manual/reference/command/findAndModify/
     */
    class FindOneAndDelete implements Executable
    {
        /**
         * Constructs a findAndModify command for deleting a document.
         *
         * Supported options:
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run.
         *
         *  * projection (document): Limits the fields to return for the matching
         *    document.
         *
         *  * sort (document): Determines which document the operation modifies if
         *    the query selects multiple documents.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern. This option
         *    is only supported for server versions >= 3.2.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $filter Query by which to filter documents
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $filter, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return object|null
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for replacing a document with the findAndModify command.
     *
     * @api
     * @see MongoDB\Collection::findOneAndReplace()
     * @see http://docs.mongodb.org/manual/reference/command/findAndModify/
     */
    class FindOneAndReplace implements Executable
    {
        const RETURN_DOCUMENT_BEFORE = 1;
        const RETURN_DOCUMENT_AFTER = 2;

        /**
         * Constructs a findAndModify command for replacing a document.
         *
         * Supported options:
         *
         *  * bypassDocumentValidation (boolean): If true, allows the write to opt
         *    out of document level validation.
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run.
         *
         *  * projection (document): Limits the fields to return for the matching
         *    document.
         *
         *  * returnDocument (enum): Whether to return the document before or after
         *    the update is applied. Must be either
         *    FindOneAndReplace::RETURN_DOCUMENT_BEFORE or
         *    FindOneAndReplace::RETURN_DOCUMENT_AFTER. The default is
         *    FindOneAndReplace::RETURN_DOCUMENT_BEFORE.
         *
         *  * sort (document): Determines which document the operation modifies if
         *    the query selects multiple documents.
         *
         *  * upsert (boolean): When true, a new document is created if no document
         *    matches the query. The default is false.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern. This option
         *    is only supported for server versions >= 3.2.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $filter Query by which to filter documents
         * @param array|object $replacement Replacement document
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $filter, $replacement, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return object|null
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for updating a document with the findAndModify command.
     *
     * @api
     * @see MongoDB\Collection::findOneAndUpdate()
     * @see http://docs.mongodb.org/manual/reference/command/findAndModify/
     */
    class FindOneAndUpdate implements Executable
    {
        const RETURN_DOCUMENT_BEFORE = 1;
        const RETURN_DOCUMENT_AFTER = 2;

        /**
         * Constructs a findAndModify command for updating a document.
         *
         * Supported options:
         *
         *  * bypassDocumentValidation (boolean): If true, allows the write to opt
         *    out of document level validation.
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run.
         *
         *  * projection (document): Limits the fields to return for the matching
         *    document.
         *
         *  * returnDocument (enum): Whether to return the document before or after
         *    the update is applied. Must be either
         *    FindOneAndUpdate::RETURN_DOCUMENT_BEFORE or
         *    FindOneAndUpdate::RETURN_DOCUMENT_AFTER. The default is
         *    FindOneAndUpdate::RETURN_DOCUMENT_BEFORE.
         *
         *  * sort (document): Determines which document the operation modifies if
         *    the query selects multiple documents.
         *
         *  * upsert (boolean): When true, a new document is created if no document
         *    matches the query. The default is false.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern. This option
         *    is only supported for server versions >= 3.2.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $filter Query by which to filter documents
         * @param array|object $update Update to apply to the matched document
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $filter, $update, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return object|null
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for inserting multiple documents with the insert command.
     *
     * @api
     * @see MongoDB\Collection::insertMany()
     * @see http://docs.mongodb.org/manual/reference/command/insert/
     */
    class InsertMany implements Executable
    {
        /**
         * Constructs an insert command.
         *
         * Supported options:
         *
         *  * bypassDocumentValidation (boolean): If true, allows the write to opt
         *    out of document level validation.
         *
         *  * ordered (boolean): If true, when an insert fails, return without
         *    performing the remaining writes. If false, when a write fails,
         *    continue with the remaining writes, if any. The default is true.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array[]|object[] $documents List of documents to insert
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, array $documents, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return InsertManyResult
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for inserting a single document with the insert command.
     *
     * @api
     * @see MongoDB\Collection::insertOne()
     * @see http://docs.mongodb.org/manual/reference/command/insert/
     */
    class InsertOne implements Executable
    {
        /**
         * Constructs an insert command.
         *
         * Supported options:
         *
         *  * bypassDocumentValidation (boolean): If true, allows the write to opt
         *    out of document level validation.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $document Document to insert
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $document, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return InsertOneResult
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for the listCollections command.
     *
     * @api
     * @see MongoDB\Database::listCollections()
     * @see http://docs.mongodb.org/manual/reference/command/listCollections/
     */
    class ListCollections implements Executable
    {
        /**
         * Constructs a listCollections command.
         *
         * Supported options:
         *
         *  * filter (document): Query by which to filter collections.
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run.
         *
         * @param string $databaseName Database name
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return CollectionInfoIterator
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for the ListDatabases command.
     *
     * @api
     * @see MongoDB\Client::listDatabases()
     * @see http://docs.mongodb.org/manual/reference/command/ListDatabases/
     */
    class ListDatabases implements Executable
    {
        /**
         * Constructs a listDatabases command.
         *
         * Supported options:
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run.
         *
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct(array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return DatabaseInfoIterator
         * @throws UnexpectedValueException if the command response was malformed
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for the listIndexes command.
     *
     * @api
     * @see MongoDB\Collection::listIndexes()
     * @see http://docs.mongodb.org/manual/reference/command/listIndexes/
     */
    class ListIndexes implements Executable
    {
        /**
         * Constructs a listIndexes command.
         *
         * Supported options:
         *
         *  * maxTimeMS (integer): The maximum amount of time to allow the query to
         *    run.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return IndexInfoIterator
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for replacing a single document with the update command.
     *
     * @api
     * @see MongoDB\Collection::replaceOne()
     * @see http://docs.mongodb.org/manual/reference/command/update/
     */
    class ReplaceOne implements Executable
    {
        /**
         * Constructs an update command.
         *
         * Supported options:
         *
         *  * bypassDocumentValidation (boolean): If true, allows the write to opt
         *    out of document level validation.
         *
         *  * upsert (boolean): When true, a new document is created if no document
         *    matches the query. The default is false.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $filter Query by which to filter documents
         * @param array|object $replacement Replacement document
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $filter, $replacement, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return UpdateResult
         */

        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for updating multiple documents with the update command.
     *
     * @api
     * @see MongoDB\Collection::updateMany()
     * @see http://docs.mongodb.org/manual/reference/command/update/
     */
    class UpdateMany implements Executable
    {
        /**
         * Constructs an update command.
         *
         * Supported options:
         *
         *  * bypassDocumentValidation (boolean): If true, allows the write to opt
         *    out of document level validation.
         *
         *  * upsert (boolean): When true, a new document is created if no document
         *    matches the query. The default is false.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $filter Query by which to filter documents
         * @param array|object $update Update to apply to the matched documents
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $filter, $update, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return UpdateResult
         */
        public function execute(Server $server)
        {
        }
    }

    /**
     * Operation for updating a single document with the update command.
     *
     * @api
     * @see MongoDB\Collection::updateOne()
     * @see http://docs.mongodb.org/manual/reference/command/update/
     */
    class UpdateOne implements Executable
    {
        /**
         * Constructs an update command.
         *
         * Supported options:
         *
         *  * bypassDocumentValidation (boolean): If true, allows the write to opt
         *    out of document level validation.
         *
         *  * upsert (boolean): When true, a new document is created if no document
         *    matches the query. The default is false.
         *
         *  * writeConcern (MongoDB\Driver\WriteConcern): Write concern.
         *
         * @param string $databaseName Database name
         * @param string $collectionName Collection name
         * @param array|object $filter Query by which to filter documents
         * @param array|object $update Update to apply to the matched document
         * @param array $options Command options
         * @throws InvalidArgumentException
         */
        public function __construct($databaseName, $collectionName, $filter, $update, array $options = [])
        {
        }

        /**
         * Execute the operation.
         *
         * @see Executable::execute()
         * @param Server $server
         * @return UpdateResult
         */
        public function execute(Server $server)
        {
        }
    }
}

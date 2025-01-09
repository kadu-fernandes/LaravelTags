# Tag Files

This is a project to lear Laravel 11.5. Its goal is to tag simple text, Markdown, MS Word and Libreoffice Write files.

The project uses a sqlite3 database.

## Tracked Directory

I must add tracked directories to the project. The root, the home and the Desktop folders are not allowed.

A tracked directory entity should have its normalized path as a property.

A normalized path is the expanded path, for example, "\~/lala" should become "/home/my\_user/lala" and "./lala" should become "/my/current/folder/lala".

I should not be able to add files as a tracked directory and the directory must exist.

When I add a tracked directory, the application should look for all the files of the given types and add them as tracked files.

### SQL Table Definition for Tracked Directory

~~~sql
CREATE TABLE tracked_directories (
    id TEXT PRIMARY KEY, -- Hash of the normalized path
    normalized_path TEXT NOT NULL UNIQUE, -- Full normalized path of the directory
    created_at TEXT NOT NULL, -- Timestamp of creation
    updated_at TEXT NOT NULL  -- Timestamp of last update
);
~~~

## Tracked File

After a directory is added, the application should search for the files of the given types and add them as tracked files.

A tracked file must be related to a tracked directory.

A tracked file entity should have its normalized path as a property.

A normalized path is the expanded path, for example, "\~/lala/lele.txt" should become "/home/my\_user/lala/lele.txt" and "./lala/lele.txt" should become "/my/current/folder/lala/lele.txt".

It should also have its short path as a property.

The short path is the folder of the file without the tracked directory. For example, if the tracked directory is "/home/my\_user/lala" and the file is "/my/current/folder/lala/boom/bang/lele.txt", the short path should be "boom/bang/".

It should also have the file name as a property. For example, if the file is "/my/current/folder/lala/boom/bang/lele.txt" the file name should be "lele.txt".

It should also have the extension as a property. For example, if the file is "/my/current/folder/lala/boom/bang/lele.txt" the extension should be "txt".

Only one tracked file per directory should be allowed, and this comparison should be done with case sensitivity. This must be ensured with a hash.

### SQL Table Definition for Tracked File

~~~sql
CREATE TABLE tracked_files (
    id TEXT PRIMARY KEY, -- Hash of the normalized path
    tracked_directory_id TEXT NOT NULL, -- Foreign key referencing tracked_directories
    normalized_path TEXT NOT NULL UNIQUE, -- Full normalized path of the file
    short_path TEXT NOT NULL, -- Relative path within the tracked directory
    file_name TEXT NOT NULL, -- File name including extension
    extension TEXT NOT NULL, -- File extension
    created_at TEXT NOT NULL, -- Timestamp of creation
    updated_at TEXT NOT NULL, -- Timestamp of last update
    FOREIGN KEY (tracked_directory_id) REFERENCES tracked_directories(id) -- Foreign key constraint
);
~~~

## Tracked Tag

A tracked tag entity represents a tag within the system. Tracked tags exist independently and can have a description for additional context. A tracked tag can be associated with multiple tracked files.

### SQL Table Definition for Tracked Tag

~~~sql
CREATE TABLE tracked_tags (
    id INTEGER PRIMARY KEY AUTOINCREMENT, -- Unique identifier for the tracked tag
    slug TEXT NOT NULL UNIQUE, -- Unique slug for the tag (case-sensitive)
    name TEXT NOT NULL, -- Display name of the tag
    description TEXT, -- Optional description of the tag
    created_at TEXT NOT NULL, -- Timestamp of creation
    updated_at TEXT NOT NULL  -- Timestamp of last update
);
~~~

### SQL Table Definition for File-Tracked Tag Relationship

~~~sql
CREATE TABLE file_tracked_tags (
    id INTEGER PRIMARY KEY AUTOINCREMENT, -- Unique identifier for the relationship
    tracked_file_id TEXT NOT NULL, -- Foreign key referencing tracked_files
    tracked_tag_id INTEGER NOT NULL, -- Foreign key referencing tracked_tags
    created_at TEXT NOT NULL, -- Timestamp of creation
    updated_at TEXT NOT NULL, -- Timestamp of last update
    FOREIGN KEY (tracked_file_id) REFERENCES tracked_files(id),
    FOREIGN KEY (tracked_tag_id) REFERENCES tracked_tags(id) -- Foreign key constraint
);
~~~

## File

A file entity represents a unique file in the system. Unlike tracked files, it is independent of specific directories and focuses on the file's unique properties.

A file can have multiple tags associated with it.

### SQL Table Definition for File

~~~sql
CREATE TABLE files (
    id TEXT PRIMARY KEY, -- Hash of the file content (unique identifier)
    normalized_path TEXT NOT NULL UNIQUE, -- Full normalized path of the file
    file_name TEXT NOT NULL, -- File name including extension
    extension TEXT NOT NULL, -- File extension
    created_at TEXT NOT NULL, -- Timestamp of creation
    updated_at TEXT NOT NULL  -- Timestamp of last update
);
~~~

### SQL Table Definition for File-Tag Relationship

~~~sql
CREATE TABLE file_tags (
    id INTEGER PRIMARY KEY AUTOINCREMENT, -- Unique identifier for the relationship
    file_id TEXT NOT NULL, -- Foreign key referencing files
    tag_id INTEGER NOT NULL, -- Foreign key referencing tags
    created_at TEXT NOT NULL, -- Timestamp of creation
    updated_at TEXT NOT NULL, -- Timestamp of last update
    FOREIGN KEY (file_id) REFERENCES files(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id) -- Foreign key constraint
);
~~~

## Tag

A tag entity represents a global tagging concept that is independent of specific directories. Tags are unique and case-sensitive.

A tag can have the following properties:

+ `slug`: A unique identifier for the tag (case-sensitive).
+ `name`: A human-readable name for the tag.
+ `description`: An optional description for the tag.

### SQL Table Definition for Tag

~~~sql
CREATE TABLE tags (
    id INTEGER PRIMARY KEY AUTOINCREMENT, -- Unique identifier for the tag
    slug TEXT NOT NULL UNIQUE, -- Unique slug for the tag (case-sensitive)
    name TEXT NOT NULL, -- Display name of the tag
    description TEXT, -- Optional description of the tag
    created_at TEXT NOT NULL, -- Timestamp of creation
    updated_at TEXT NOT NULL  -- Timestamp of last update
);
~~~

## JSON File Structure

The JSON file structure for each tracked directory avoids ID-based relationships and uses unique slugs for tags and relative paths for files. Below is an example of the JSON structure:

~~~json
{
  "directory": "Tracked Directory Metadata",
  "files": [
    {
      "short_path": "boom/bang/lele.txt",
      "file_name": "lele.txt",
      "extension": "txt",
      "tags": ["important", "work"],
      "last_modified": "2025-01-05T12:34:56Z"
    },
    {
      "short_path": "documents/file1.md",
      "file_name": "file1.md",
      "extension": "md",
      "tags": ["todo"],
      "last_modified": "2025-01-05T12:35:00Z"
    }
  ],
  "tags": [
    {
      "slug": "important",
      "name": "Important",
      "description": "Files that need immediate attention"
    },
    {
      "slug": "work",
      "name": "Work",
      "description": "Files related to work tasks"
    },
    {
      "slug": "todo",
      "name": "To-Do",
      "description": "Tasks to be completed"
    }
  ]
}
~~~

### Explanation of the Structure

1. **`files` Array**:
   + Contains details about each file in the tracked directory.
   + Includes:
     + `short_path`: The path relative to the tracked directory.
     + `file_name` and `extension` for file identification.
     + `tags`: An array of tag slugs associated with the file.
     + `last_modified`: Timestamp of the last modification.
1. **`tags` Array**:
   + Contains all tags used within this directory.
   + Each tag includes:
     + `slug`: Unique identifier for the tag.
     + `name`: Display name for the tag.
     + `description`: Optional description for additional context.

### Key Points

+ **Importing JSON**:
  1. Import all `tags` first. If a `TrackedTag` with the same `slug` already exists, ignore any duplicates.
  1. Import `files` as `TrackedFiles` and associate them with the corresponding `TrackedTags` using the `slug`.
  1. Relate `TrackedFiles` to the appropriate `TrackedDirectory` based on the import context.

+ **Exporting JSON**:
  1. **Delete and recreate** the JSON file at every export.
  1. Export **all `TrackedTags` as `tags`**, even if they are not currently associated with any `TrackedDirectory`.
  1. Export only `TrackedFiles` that are part of a `TrackedDirectory`.
  1. For each `TrackedFile`, include the associated `TrackedTags` by their `slug`.

+ **Portability**:
    + The JSON file can be used across systems without relying on database IDs, ensuring seamless synchronization.

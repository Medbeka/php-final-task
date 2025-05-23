# php-final-task
PHP OOP Password Manager — Task Summary
Completed All Required Project Tasks

Task Breakdown & My Comments:
OOP-based PHP Implementation

Built the entire project using Object-Oriented PHP.

Used classes for user management, encryption, and database interaction.

MySQL Integration

Data is stored in a well-structured MySQL database.

Tables include users and stored passwords with appropriate types and indexing.

User Registration & Login with Hashed Passwords

Implemented secure user sign-up/login.

Passwords are hashed using password_hash() before being stored.

AES Encrypted Key Storage

On user registration, a KEY is generated.

The KEY is encrypted using AES with the user’s plain password.

The KEY is permanent and does not change after creation.

Custom Password Generator Class (Optional)

This task was not implemented.

Password Saving with Metadata

Passwords are saved with:

Website or program name

Auto-generated timestamp

Generated or user-provided password

Login Password Change Handling

Implemented functionality to re-encode the encryption KEY if the login password changes.

UML and DB Diagram

UML diagram of classes and database schema were created and included.

# Moodle External API Integration Sample

This is a simplified example of how to integrate Moodle with an external system using REST APIs.

## Features:
- Connects to an external API using a secure token.
- Fetches user enrolment data.
- Enrols users into Moodle courses based on external data.
- Can be triggered by cron.

## How it works:
1. Sends a request to the external API.
2. Receives JSON data with user email, course ID, and role.
3. Matches existing users in Moodle and enrols them.

---

Based on actual integration projects for training organisations using Moodle in production environments.
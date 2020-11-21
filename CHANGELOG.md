# Rolling Release Changes

These changes have not yet been incorporated into a stable release, but if you are on the latest version of the rolling release channel, you can take advantage of these new features and fixes.

This release includes many contributions from members of our community as part of the annual Hacktoberfest event, where we selected a number of items that our core developer team, along with the community submitting pull requests, could work on during the month.

## New Features/Changes

- **Media storage overhaul**: The way media is stored and managed has been completely changed:
  - Station media, live recordings, and backups have "Storage Locations" that you can manage via System Administration.
  - Storage locations can either be local to the server or using a remote storage location that uses the Amazon S3 protocol (S3, DigitalOcean Spaces, Wasabi, etc)
  - Existing stations have automatically been migrated to Storage Locations.
  - If more than one station shares a storage location, media is only processed once for all of the stations, instead of being processed separately.

- Statistics now include the total _unique_ listeners for a given station in a given day. On the dashboard, you can switch from the average listener statistics to the unique listener totals from a new tab selector above the charts.

- There is a new, much friendlier animation that displays when Docker installations of Radiolize are waiting for their dependent services to be fully ready. This avoids showing the previous messages, which often looked like errors, even though they weren't.

- The global "Administer Users" and "Administer Permissions" permissions have been *removed* from the system. In both cases, users who had this permission could effectively make themselves a super administrator user, so user and permission management is now only accessible by users with the "Administer All" permission.

## Code Quality/Technical Changes

- **Removal of InfluxDB**: Despite the ever-increasing complexity of Radiolize, sometimes we review our dependencies to ensure if the additional load and maintenance overhead they cause is worth the benefit to our system. In the case of our InfluxDB time series database, we decided that this dependency was no longer needed, and its purposes could be fully handled by our existing MariaDB database. This decision was also motivated by Influxdata releasing a non-backwards-compatible new version of the software, which would present a very challenging migration to our users. Instead, we have removed the dependency entirely.

- **Multiple code quality improvements**: We have incorporated stricter code standards checking into our continuous integration (CI) process and updated our code accordingly, so any code that publishes to stations will meet a stringent set of code style, standards, static analysis and pass our normal test suites.

- **Songs table overhaul**: A `Songs` table has existed for the entirety of Radiolize's existence as the authoritative source of spelling and capitalization for all song titles, artists, etc. This solution was not scalable to large stations and there was no effective way to clean up this table once it became vastly oversized. This update removes the `Songs` table entirely and relocates its attributes to the various tables that used it before (song history, request queue, etc).

- SweetAlert has been updated to SweetAlert2; alert prompts will now also have the same theme as the current active theme on the page.

- Update checks have been simplified; if you are on the "rolling release" channel you will see rolling release updates, and if you are on the stable channel you will see stable version releases only.

- When adding tracks to, or removing tracks from, a playlist, its current playback queue will be more intelligently updated instead of being reset completely, which was much more likely to lead to duplicate artist/title playback.

- The SASS (specifically, SCSS) code of our underlying theme has been greatly simplified and updated to include some features from the Bootstrap 4.5 library.

- The station profile and public player are now fully converted into Vue components, which improves their performance for many users and allows us to much more easily make changes to them in the future, including making the public player customizable by users embedding it into their own websites.

- Plugins can now add their own ACL permissions via the new `App\Event\BuildPermission` event.

### Country visit counter

All necessary code located in `jc9/CountryVisit` directory.
Rest routes are in `jc9/CountryVisit/routes/api.php`.
Controller is in `jc9/CountryVisit/src/UserInterface/Controllers`.

To be ready for high load, I would use RoadRunner as server, I would horizontally scale the application
and use redis cluster.

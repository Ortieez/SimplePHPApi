# Simple PHP Math Api

## Current progress

- Phase (1, GET with Parameters)
  - `?operation=x&numbers=y,z`
  - x ... operation (see current operations list)
  - y, z ... simple numbers (1, 10, -20, 80 ...)

- Phase (2, URL with slashes)

  - `http://localhost/math.api/phase2/ x / y / z`
  - x ... operation (see current operations list)
  - y, z ... simple numbers (1, 10, -20, 80 ...)

- Phase (3, URL with POST data)

  - Send post request to url:
    - { numbers: [1,2,3], dttm:"2022-12-07 10:15:00"}
  - URL = `http://localhost/math.api/utils/x`
  - x ... operation (see current operations list)

## Operations list available

- add (addition / +)
- sub (subtract / -)
- mul (multiply / *)
- div (divide / /)
- mod (modulo / %)
- sqrt (square root / ^2)

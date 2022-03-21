for (let index = 1; index < 21; index++) {
    console.log((index % 3 === 0 ? 'Fizz' : '') + (index % 5 === 0 ? 'Buzz' : '') || index)
}
import { Component, Output, EventEmitter} from '@angular/core';


@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.css']
})

export class SearchComponent {

  @Output() motCle = new EventEmitter<string>();

  recherche(value: string) {
    this.motCle.emit(value);
  }
}